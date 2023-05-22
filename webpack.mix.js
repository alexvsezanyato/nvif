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

{
    const sourcePath = path.resolve(`./resources/css/skeleton/components`)
    const destinationPath = path.resolve(`./public/css/skeleton/components`)

    fs.readdirSync(sourcePath).forEach(fileName => {
        console.log([`${sourcePath}/${fileName}`, `${destinationPath}/${fileName}`])
    })
}
