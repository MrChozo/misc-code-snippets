<?php
/**
 * Attributes example from [PHP.net](https://www.php.net/manual/en/language.attributes.overview.php)
 *
 * My current understanding is that Attributes are used as an alternate form of interface
 * that can be applied to "...Classes, methods, functions, parameters, properties and class
 * constants..." instead of just classes, and, based on this example, they are usually used
 * in conjunction with the Reflection API in order to be applied during runtime.
 *
 * This example applies the SetUp class as an attribute to a couple of the CopyFile class'
 * methods in order to effectively label them as methods that happen as a part of setting
 * up the CopyFile "action". The executeAction function, having no direct reference to
 * CopyFile itself, only looks for a generic ActionHandler and any SetUp methods it may use.
 * It knows that there must be an execute() method because of the ActionHandler interface,
 * so it is effectively able to say, "Look for anything that's labeled as SetUp, run it,
 * and then run execute()." without knowing much about the CopyFile implementation at all.
 * This way, CopyFile can easily be replaced, and those methods that are labeled as SetUp
 * could be entirely different on its replacement and will still be run prior to execute().
 */
interface ActionHandler
{
    public function execute();
}

#[Attribute]
class SetUp {}

class CopyFile implements ActionHandler
{
    public string $fileName;
    public string $targetDirectory;

    #[SetUp]
    public function fileExists()
    {
        if (!file_exists($this->fileName)) {
            throw new RuntimeException("File does not exist");
        }
    }

    #[SetUp]
    public function targetDirectoryExists()
    {
        if (!file_exists($this->targetDirectory)) {
            mkdir($this->targetDirectory);
        } elseif (!is_dir($this->targetDirectory)) {
            throw new RuntimeException("Target directory $this->targetDirectory is not a directory");
        }
    }

    public function execute()
    {
        copy($this->fileName, $this->targetDirectory . '/' . basename($this->fileName));
    }
}

function executeAction(ActionHandler $actionHandler)
{
    $reflection = new ReflectionObject($actionHandler);

    foreach ($reflection->getMethods() as $method) {
        $attributes = $method->getAttributes(SetUp::class);

        if (count($attributes) > 0) {
            $methodName = $method->getName();

            $actionHandler->$methodName();
        }
    }

    $actionHandler->execute();
}

$copyAction = new CopyFile();
$copyAction->fileName = "./tmp/foo.jpg";
$copyAction->targetDirectory = "./home/user";

executeAction($copyAction);

echo "executeAction() has been executed.\n";
