<?php if($_GET['username']){ ?> 
var user = (<?php 
	$username = urlencode($_GET['username']);
	$ch = curl_init();
	$timeout = 5; // set to zero for no timeout
	curl_setopt ($ch,CURLOPT_URL,"http://github.com/api/v1/json/$username");
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	echo $file_contents;
?>);
var projects = user['user'];
var ul = document.getElementById('yaghb');
var repos = projects['repositories'];
var n = repos.size();
for(var i = 0; i < n; i++) {
  repo = repos[i];
  var li = document.createElement('li');
  var a = document.createElement('a');
  a.href = repo['url'];
  a.title  = repo['description'];
  var txt = document.createTextNode(repo['name']);
  a.appendChild(txt);
  li.appendChild(a);
  ul.appendChild(li);
}
<?php } ?>
