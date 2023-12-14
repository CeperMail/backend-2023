const persiapan = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve("Menyiapkan bahan..")
        }, 3000)
    })
}

const rebusAir = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve("merebus air..")
        }, 7000)
    })
}

const masak = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve("memasak mie..")
        }, 5000)
    })
}

//makan janji

// persiapan()
//     .then((result) => {
//         console.log(result)
//         return rebusAir()
//     })
//     .then((result) => {
//         console.log(result)
//         return masak()
//     })
//     .then((result) => {
//         console.log(result)
//     })

const second = async () => {
    const hasilPersiapan = await persiapan()
    const hasilRebusAir = await rebusAir()
    const hasilMasak = await masak()

    console.log(hasilPersiapan)
    console.log(hasilRebusAir)
    console.log(hasilMasak)
}

second()