const fs = require('fs')
const path = require('path')

{
    const sourcePath = path.resolve('./resources/css/skeleton/components')
    const destinationPath = path.resolve('./public/css/skeleton/components')

    fs.readdirSync(sourcePath).forEach(fileName => {
        console.log([`${sourcePath}/${fileName}`, `${destinationPath}/${fileName}`])
    })
}
