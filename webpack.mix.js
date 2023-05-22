const mix = require('laravel-mix')
const fs = require('fs')
const path = require('path')

mix.styles(
    'resources/css/skeleton/*.css',
    'public/css/skeleton.css'
)

mix.styles(
    'resources/css/white-theme/*.css',
    'public/css/white-theme.css'
)

mix.styles(
    'resources/css/dark-theme/*.css',
    'public/css/dark-theme.css'
)

const cssComponentDir = 'components'
const cssDir = 'css'

Array('skeleton', 'white-theme', 'dark-theme').forEach(cssType => {
    const sourcePath = path.resolve(`./resources/${cssDir}/${cssType}/${cssComponentDir}`)
    const destinationPath = path.resolve(`./public/${cssDir}/${cssType}`)

    fs.readdirSync(sourcePath).forEach(fileName => {
        mix.styles(`${sourcePath}/${fileName}`, `${destinationPath}/${fileName}`)
    })
})
