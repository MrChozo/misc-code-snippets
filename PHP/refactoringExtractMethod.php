<?php
/**
 * The Extract Method
 * 
 * Source: https://qafoo.com/blog/098_extract_method.html
 *
 * This article describes refactoring a controller method by separating its
 * higher level logic from its low level logic into two methods, in order to
 * ensure that each stays on a single level of abstraction. The author describes
 * this as an explanation of refactoring heuristics being applied, and I think
 * that's an apt description.
 *
 * Extracting logic like this fulfills the Object Calisthenic that involves
 * having as few levels of indention in code as possible, in order to improve
 * reability and separation of concerns.
 */

////////////////////////////////////////////////////////////////
// This method is refactored into being the two below methods //
////////////////////////////////////////////////////////////////
public function searchAction(Request $request)
{
    if ($request->has('query') || $request->has('type')) {
        $solarium = new \Solarium_Client();
        $select = $solarium->createSelect();

        if ($request->has('type')) { // filter by type
            $filterQueryTerm = sprintf(
                'type:%s',
                $select->getHelper()->escapeTerm($request->get('type'))
            );
            $filterQuery = $select->createFilterQuery('type')->setQuery($filterQueryTerm);
            $select->addFilterQuery($filterQuery);
        }

        // more filtering logic here

        $result = $solarium->select($query);

        return ['result' => $result];
    }

    return [];
}


////////////////////////////////////////////////////////////////
// These methods are a result of refactoring the above method //
////////////////////////////////////////////////////////////////
public function searchAction(Request $request)
{
	if ($request->has('query') || $request->has('type')) {
		$result = $this->search($request);	
		return ['result' => $result];
    }
    return [];
}

private function search(Request $request)
{
	$solarium = new \Solarium_Client();
	$select = $solarium->createSelect();

	if ($request->has('type')) { // filter by type
	    $filterQueryTerm = sprintf(
	        'type:%s',
	        $select->getHelper()->escapeTerm($request->get('type'))
	    );
	    $filterQuery = $select->createFilterQuery('type')->setQuery($filterQueryTerm);
	    $select->addFilterQuery($filterQuery);
	}

	// more filtering logic here
	$result = $solarium->select($query);
	return $result;
}
