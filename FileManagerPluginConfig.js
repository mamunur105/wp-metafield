const FileManagerPluginConfig = (production) => {
	const Devconfig = {
		events: {
			// onStart: {
			// 	delete: [
			// 		'./assets/scripts',
			// 		'./dist'
			// 	]
			// }
		}
	}
	const config = {
		events: {
			...Devconfig.events,
			onEnd: {
				copy: [
					{
						source: './readme.txt',
						destination: './dist/wp-tinyfield/readme.txt'
					},
					{
						source: './LICENSE.txt',
						destination: './dist/wp-tinyfield/LICENSE.txt'
					},
					{
						source: './index.php',
						destination: './dist/wp-tinyfield/index.php'
					},
					{
						source: './wp-tinyfield.php',
						destination: './dist/wp-tinyfield/wp-tinyfield.php'
					},
					{
						source: './assets',
						destination: './dist/wp-tinyfield/assets'
					},
					{
						source: './Apps',
						destination: './dist/wp-tinyfield/Apps'
					},
					{
						source: './vendor',
						destination: './dist/wp-tinyfield/vendor'
					}
				],
				archive: [
					{
						source: './dist/wp-tinyfield',
						destination: './dist/wp-tinyfield.zip'
					}
				]
			}
		}
	};

	return production ? config : Devconfig;
};

module.exports = FileManagerPluginConfig;
