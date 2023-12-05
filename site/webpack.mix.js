const mix = require('laravel-mix')
const fs = require('fs')
const path = require('path')

mix.options({
    'cssModuleIdentifier': '[name]-[local]-[hash:base64:3]'
})

mix.alias({
    '@': './resources/js/react',
    '@images': './public/images'
})

mix.sourceMaps()

mix.styles(
    'resources/css/skeleton/*',
    'public/css/skeleton.css'
)

mix.styles(
    'resources/css/white-theme/*',
    'public/css/white-theme.css'
)

mix.styles(
    'resources/css/dark-theme/*',
    'public/css/dark-theme.css'
)

const cssComponentDir = 'components'
const cssDir = 'css'

Array('skeleton', 'white-theme', 'dark-theme').forEach(cssType => {
    const sourcePath = path.resolve(`resources/${cssDir}/${cssType}/${cssComponentDir}`)
    const destinationPath = path.resolve(`public/${cssDir}/${cssType}`)

    fs.readdirSync(sourcePath).forEach(fileName => {
        mix.styles(`${sourcePath}/${fileName}`, `${destinationPath}/${fileName}`)
    })
})

mix.js(
    'resources/js/app.jsx',
    'public/js/app.js',
).react()
