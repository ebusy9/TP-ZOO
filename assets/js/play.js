document.addEventListener("DOMContentLoaded", (event) => {
    const storeBtn = document.querySelector("#storeBtn")
    let clickCount = 1;
    storeBtn.addEventListener("click", (event) => {
        clickCount++
        let store = document.querySelector("#store")
        if (clickCount % 2 === 0) {
            store.hidden = false
        } else {
            store.hidden = true
        }
    })

    function verifyBalanceAndDisableStoreBtns(balance){

        if(balance < 23){
            buyPiscivoreF.disabled = true
        } else {
            buyPiscivoreF.disabled = false
        }

        if(balance < 20){
            buyFilterFeedF.disabled = true
        } else {
            buyFilterFeedF.disabled = false
        }

        if(balance < 25){
            buyCarnivoreF.disabled = true
        } else {
            buyCarnivoreF.disabled = false
        }

        if(balance < 18){
            buyHerbivoreF.disabled = true
        } else {
            buyHerbivoreF.disabled = false
        }

        if(balance < 10){
            buyWater.disabled = true
        } else {
            buyWater.disabled = false
        }

        if(balance < 75){
            buyFirstAidKit.disabled = true
        } else {
            buyFirstAidKit.disabled = false
        }
    }

    

    const balance = document.querySelector("#balance")
    const buyPiscivoreF = document.querySelector("#buyPiscivoreF")
    const buyFilterFeedF = document.querySelector("#buyFilterFeedF")
    const buyHerbivoreF = document.querySelector("#buyHerbivoreF")
    const buyCarnivoreF = document.querySelector("#buyCarnivoreF")
    const buyWater = document.querySelector("#buyWater")
    const buyFirstAidKit = document.querySelector("#buyFirstAidKit")

    var currentBalance = parseInt(balance.innerHTML)
    verifyBalanceAndDisableStoreBtns(currentBalance)

    async function fetchUserAction(data) {
        const response = await fetch("../../process/game/userAction.php", {
            method: "POST",
            headers: {
                "Content-type": "application/json",
            },
            body: JSON.stringify(data),
        });
        return response.json();
    }

    buyPiscivoreF.addEventListener("click", (event) => {
        const data = {
            item_bought: "PiscivoreFood"
        }
        fetchUserAction(data)
        .then((response) => {
            balance.innerHTML = response
        })

    })
    buyFilterFeedF.addEventListener("click", (event) => {
        const data = {
            item_bought: "FilterFeedFood"
        }
        fetchUserAction(data)
        .then((response) => {
            balance.innerHTML = response
        })
    })
    buyHerbivoreF.addEventListener("click", (event) => {
        const data = {
            item_bought: "HerbivoreFood"
        }
        fetchUserAction(data)
        .then((response) => {
            balance.innerHTML = response
        })
    })
    buyCarnivoreF.addEventListener("click", (event) => {
        const data = {
            item_bought: "CarnivoreFood"
        }
        fetchUserAction(data)
        .then((response) => {
            balance.innerHTML = response
        })
    })
    buyWater.addEventListener("click", (event) => {
        const data = {
            item_bought: "Water"
        }
        fetchUserAction(data)
        .then((response) => {
            balance.innerHTML = response
        })
    })
    buyFirstAidKit.addEventListener("click", (event) => {
        const data = {
            item_bought: "FirstAidKit"
        }
        fetchUserAction(data)
        .then((response) => {
            balance.innerHTML = response
        })
    })


})