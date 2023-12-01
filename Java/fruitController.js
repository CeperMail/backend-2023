//import file
const buah = require('./data');

//menampilkan semua data
const index = () => {
    for (const buahs of buah) {
        console.log(buahs)
    }
}

//menambahkan data
const store = (name) => {
    buah.push(name)
    console.log(`Menambahkan data ${name}`)
    index()
}

// mengupdate data berdasarkan index
const update = (pembaruan, namaBaru) => {
    if (pembaruan >= 0 && pembaruan < buah.length) {
        buah[pembaruan] = namaBaru;
        console.log(`Mengupdate data pada index ${pembaruan} menjadi ${namaBaru}`);
        index();
    } else {
        console.log(`Index ${pembaruan} tidak valid`);
    }
}

// menghapus data berdasarkan nama buah
const destroy = (name) => {
    const hapus = buah.indexOf(name);

    if (hapus !== -1) {
        buah.splice(hapus, 1);
        console.log(`Menghapus data ${name}`);
        index();
    } else {
        console.log(`${name} tidak ditemukan`);
    }
}

//export method
module.exports = {index, store, update, destroy}