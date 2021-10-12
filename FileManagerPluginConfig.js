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
						destination: './dist/wp-picofield/readme.txt'
					},
					{
						source: './LICENSE.txt',
						destination: './dist/wp-picofield/LICENSE.txt'
					},
					{
						source: './index.php',
						destination: './dist/wp-picofield/index.php'
					},
					{
						source: './wp-picofield.php',
						destination: './dist/wp-picofield/wp-picofield.php'
					},
					{
						source: './assets',
						destination: './dist/wp-picofield/assets'
					},
					{
						source: './classes',
						destination: './dist/wp-picofield/classes'
					},
					{
						source: './vendor',
						destination: './dist/wp-picofield/vendor'
					}
				],
				archive: [
					{
						source: './dist/wp-picofield',
						destination: './dist/wp-picofield.zip'
					}
				]
			}
		}
	};

	return production ? config : Devconfig;
};

module.exports = FileManagerPluginConfig;
