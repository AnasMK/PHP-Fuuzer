# PHP-Fuuzer

<p>PHP-Fuzzer is a blackbox testing tool for web applications using generated random parameters for GET and POST requests.</p>
<p>It is implemented using <a href="https://github.com/jonnnnyw/php-phantomjs/">PHP-PhantomJS</a>.</p>

<h2>Prerquistes</h2>
<ul>
	<li>install <a href="https://getcomposer.org/">composer</a></li>
	<li>install <a href="https://phpunit.de/">PHPUnit</a></li>
	<li>install <a href="https://github.com/jonnnnyw/php-phantomjs/">PHP-PhantomJS</a></li>
</ul>
<span>Note: these must be installed on the root of the project</span>

<h2>installation steps:</h2>
<ol>
	<li>
		Go to <code>/vendor/jonnyw/php-phantomjs</code> and install composer again:
	<br>1.<code>curl -s http://getcomposer.org/installer | php</code>
	<br>2.<code>php composer.phar install</code>
</li>
	<li>You can see diffrent examples in the Tests folder <code>vendor/jonnyw/php-phantomjs/src/JonnyW/PhantomJs/Tests</code></li>


<span><h5>Note</h5> If you want to run these test cases you need to set the path to the <b>outer</b> bin folder in each test case<br>
<code> $client = $this->getClient();</code>
<br><code>$client->getEngine()->setPath('projectRoot\bin\phantomjs.exe');</code>
</span>

<li>Copy <code>entries.php</code> and <code>fuzzTest.php</code> to the Tests folder </li>
</ol>

<h2>Usage steps:</h2>
<ol>
	<li>Go to <code>entries.php</code> and custumize it to your project</li>
	<li>from Cli go to <code>/vendor/jonnyw/php-phantomjs</code>and run <code>phpunit</code> command</li>
</ol>

<h2>Next releases features:(InshaaAllah)</h2>
<ol>
	<li>crawler: to get the website links automatically</li>
	<li>FuzzDB: to improve the random input generator</li>
</ol>



