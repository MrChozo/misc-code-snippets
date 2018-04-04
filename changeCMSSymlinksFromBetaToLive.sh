#!/bin/bash
# Remove cms_beta symlinks from a CMS site and then replace them with cms symlinks
# Use from anywhere, path input has no validation yet

lnFiles=( 'app_controller.php' 'controllers' 'views' 'models' 'css' 'js' )
webrootFiles=( 'css' 'js' )
webroot=webroot/
liveCmsDir=/var/www/cms/


# Essentially PHP "in_array" equivalent
containsElement () {
  local b match="$1"
  shift
  for b; do [[ "$b" == "$match" ]] && return 0; done 
  return 1
}

# Actual program
printf "This assumes $liveCmsDir for 'live' CMS directory.\n"


printf "The following files/directories will be affected:\n"
for i in "${lnFiles[@]}"
do
	printf "$i\n"
done


read -p "Continue? (Y/N): " confirm && [[ $confirm == [yY] || $confirm == [yY][eE][sS] ]] || exit 1

read -p "Full path to the project's app directory with leading slash? E.g. '/var/www/foo/app/': " appPath



for i in "${lnFiles[@]}"
do
	ds=''

	if containsElement "$i" "${webrootFiles[@]}"
	then
		ds="$webroot"
	fi


	rm "$appPath$ds$i"

	ln -s "$liveCmsDir$i" "$appPath$ds$i"
done



# Example output:

# rm app_controller.php
# rm controllers
# rm views
# rm models
# rm webroot/css
# rm webroot/js

# ln -s /var/www/cms/app_controller.php /var/www/fhjacpas.com/app/app_controller.php
# ln -s /var/www/cms/controllers/ /var/www/fhjacpas.com/app/controllers
# ln -s /var/www/cms/views/ /var/www/fhjacpas.com/app/views
# ln -s /var/www/cms/models/ /var/www/fhjacpas.com/app/models
# ln -s /var/www/cms/css/ /var/www/fhjacpas.com/app/webroot/css
# ln -s /var/www/cms/js/ /var/www/fhjacpas.com/app/webroot/js