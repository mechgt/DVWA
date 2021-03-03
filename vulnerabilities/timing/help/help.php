<div class="body_padded">
	<h1>Help - Timing Attack (Login)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>About</h3>
		<p>A Timing Attack is a form of a side-channel attack. An attacker does not have direct access to the secret information (i.e. the password), but rather analyze time differences between different actions and eventually infer the secret information.</p>

		<p>When strings are compared (such as a cleartext password) they're compared byte by byte at very low levels, starting from the first character or byte. In an equivalence request, as soon as a mismatch is found, the comparision stops and returns false. A correct answer requires comparision of all bytes in the string, and an incorrect answer exits early. A string with the same first characters, e.g. Passport vs. Password123, requires comparison of the first 4 characters before exiting.</p>

		<p>An attacker can rotate the first character timing the difference in time required searching for the request that takes a slightly longer amount of time.  Repeat this process for the 2nd, 3rd, etc. characters until the password is revealed.</p>

		<p>Given 95 printable ASCII chars and 1000 guesses per second, a brute force attack on an 8 character password will take 95^8 / 2 guesses on average or 105,000 years. A timing attack that took 1000 samples per character may take 95*8*1000 guesses which is less than 1 hour at the rate above.</p>

		<br /><hr /><br />

		<h3>Objective</h3>
		<p>Write a script that cycles through characters looking for the character that takes the longest time, and then proceed to the next character untile the password is discovered. This may be similar to a brute force attack, but the guesses are methodical, and timing statistics must be collected and analyzed.</p>

		<br /><hr /><br />

		<h3>Low Level</h3>
		<p>A table top situation which has been artificially enhanced to make it easy to learn the technique.</p>

		<br />

		<h3>Medium Level</h3>
		<p>TODO!</p>

		<br />

		<h3>High Level</h3>
		<p>TODO!</p>

		<br />

		<h3>Impossible Level</h3>
		<p>TODO!</p>

	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Reference: <?php echo dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/Password_cracking' ); ?></p>
</div>
