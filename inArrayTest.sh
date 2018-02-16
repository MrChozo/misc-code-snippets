#!/bin/bash
# Essentially PHP "in_array" equivalent
# Pulled from: https://stackoverflow.com/a/8574392/6495135

containsElement () {
  local b match="$1"
  shift
  for b; do [[ "$b" == "$match" ]] && return 0; done 
  return 1
}

# A test run of that function could look like:
array=("something to search for" "a string" "test2000")

containsElement "a string" "${array[@]}"
echo $?
# 0

containsElement "blaha" "${array[@]}"
echo $?
# 1



# example of usage in an "if" statement
# if elementIn "$table" "${skip_tables[@]}" ; then echo skipping table: ${table}; fi;