/**
 * Replacing switch statements with OOP design patterns.
 * Found here: https://stackoverflow.com/questions/126409/ways-to-eliminate-switch-in-code
 * 
 * This
 */
class RequestHandler {
    public void handleRequest(int action) {
        switch(action) {
            case LOGIN:
                doLogin();
                break;
            case LOGOUT:
                doLogout();
                break;
            case QUERY:
               doQuery();
               break;
        }
    }
}



/**
 * Versus this
 */
interface Command {
    public void execute();
}

class LoginCommand implements Command {
    public void execute() {
        // do what doLogin() used to do
    }
}

class RequestHandler {
    private Map<Integer, Command> commandMap; // injected in, or obtained from a factory

    public void handleRequest(int action) {
        Command command = commandMap.get(action);
        command.execute();
    }
}









/**
 * Or this
 */
class House {
    private int state;

    public void enter() {
        switch (state) {
            case INSIDE:
                throw new Exception("Cannot enter. Already inside");
            case OUTSIDE:
                 state = INSIDE;
                 ...
                 break;
         }
    }
    public void exit() {
        switch (state) {
            case INSIDE:
                state = OUTSIDE;
                ...
                break;
            case OUTSIDE:
                throw new Exception("Cannot leave. Already outside");
        }
    }
}

/**
 * Versus this
 * 
 * Introducing a 'State' object.
 */
 // Throw exceptions unless the behavior is overridden by subclasses
abstract class HouseState {
    public HouseState enter() {
        throw new Exception("Cannot enter");
    }
    public HouseState leave() {
        throw new Exception("Cannot leave");
    }
}

class Inside extends HouseState {
    public HouseState leave() {
        return new Outside();
    }
}

class Outside extends HouseState {
    public HouseState enter() {
        return new Inside();
    }
}

class House {
    private HouseState state;
    public void enter() {
        this.state = this.state.enter();
    }
    public void leave() {
        this.state = this.state.leave();
    }
}
