const {index, store, update, destroy} = require('./fruitController')

//membuat fungsi utama
const main = () => {
    console.log(`Menampilkan data seluruh buah`)
    index()
    
    store('melon')

    update(0, 'manggis')

    destroy('mangga')
}

main()