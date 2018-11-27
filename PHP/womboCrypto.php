<?php
function womboCrypto($username, $password) {
	echo crypt($password, sha1($username.$password));
}

womboCrypto("foo", "bar");
exit;
