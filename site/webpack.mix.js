const mix = require('laravel-mix')
const fs = require('fs')
const path = require('path')

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
    'resources/js/*.js',
    'public/js/bundle.js'
)

const jsComponentDir = "components"
const jsDir = 'js'

const sourcePath = path.resolve(`resources/${jsDir}/${jsComponentDir}`)
const destinationPath = path.resolve(`public/${jsDir}`)

fs.readdirSync(sourcePath).forEach(fileName => {
    mix.js(`${sourcePath}/${fileName}`, `${destinationPath}/${fileName}`)
})
