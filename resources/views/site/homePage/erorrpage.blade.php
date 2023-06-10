<!DOCTYPE html>
<html>
<head>
	<title>Centered Page Example</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
			background-color: #f5f5f5;
		}
		.container {
			text-align: center;
			max-width: 600px;
			padding: 20px;
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 5px 10px rgba(0,0,0,0.1);
		}
		.container img {
			max-width: 100%;
			height: auto;
			margin-bottom: 20px;
		}
		.container p {
			font-size: 18px;
			line-height: 1.5;
			margin: 0 auto;
			max-width: 80%;
			overflow-wrap: break-word;
			word-wrap: break-word;
			hyphens: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<img src="https://example.com/image.jpg" alt="Example Image">
		<p>This is an example description that can go beyond two lines of text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum justo ac nisl eleifend molestie. Nulla nec massa ut ex volutpat tincidunt a eget nisi. Nam bibendum orci vel dolor suscipit euismod. Sed bibendum suscipit purus, vel sagittis lacus gravida at. Nullam consectetur elit elit, at vehicula purus congue a. Nunc id felis sed odio laoreet imperdiet ut vel est. </p>
	</div>
</body>
</html>
