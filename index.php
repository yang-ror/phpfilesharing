<!DOCTYPE html>
<html lang="en">
<head>
	<title>🍊🐑</title>
	<style>
		:root {
            --primary-color: #2a64b0;
            --secondary-color: #f1f1f1;
            --resume-width: 1000px;
        }
		html {
			width: 100vw;
			height: 100vh;

		}
		body {
			margin: 0;
			width: 100vw;
			height: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			align-items: center;
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
                'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
		}
		form, #invalid {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		input, #invalid div {
			margin: 10px;
		}
	</style>
</head>
<body>
	<?php
		function list_files($directory_name) {
			$files = array();
			$dir = "./$directory_name";
			if (is_dir($dir)) {
				$scanned_directory = array_diff(scandir($dir), array('..', '.'));
				foreach ($scanned_directory as $file) {
					if (!is_dir("$dir/$file") && substr($file, 0, 1) !== '.') {
						$files[] = $file;
					}
				}
			}
			return $files;
		}

		if (isset($_GET['code'])) {
			$code = $_GET['code'];
			$files = list_files($code);

			if (count($files) == 0) {
				echo "<div>❌</div>";
				echo "<div id='invalid'><div>Invalid Code.</div>";
				echo "<button onclick='history.back()'>Back</button></div>";
			} else {
				echo "<div>❤️🌧️👨‍👩‍👦⛵️</div>";
				echo "<ol>";

				foreach ($files as $file) {
					echo "<li><a href='$code/$file'>$file</a></li>";
				}

				echo "</ol>";
			}
		} else {
			echo '<div>🍊🐑</div>
			<form onsubmit="redirectToDirectory()">
				<label for="code">Enter your code:</label>
				<input type="text" id="code" name="code"">
				<button type="submit" id="submitButton">Go</button>
			</form>';
		}

	?>
	<script type="text/javascript">
		function redirectToDirectory() {
			const userInput = document.getElementById("code").value
			console.log(userInput)

			if(!userInput) return

			window.location.href = "/" + userInput
		}
		// document.addEventListener('DOMContentLoaded', function() {
		// 	checkInputLength()
		// })
	</script>
</body>
</html>
