import esbuild from 'esbuild';
import { sassPlugin } from 'esbuild-sass-plugin';

const args = process.argv.slice(2);

esbuild
  .build({
    entryPoints: [
      'resources/css/app.scss',
      'resources/js/app.js'
    ],
    bundle: true,
    watch: args[0] === '--watch' ? true : false,
    outdir: 'public',
    minify: true,
    loader: {'.js': 'jsx'},
    plugins: [
      sassPlugin()
    ]
  })
  .catch(() => process.exit(1))