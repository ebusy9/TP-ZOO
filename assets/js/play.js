document.addEventListener("DOMContentLoaded", (event) => {

    function formatTime(minutes) {
        const hours = Math.floor(minutes / 60);
        const mins = minutes % 60;
        return `${String(hours).padStart(2, '0')}:${String(mins).padStart(2, '0')}`;
    }

    function updateTimer() {
        document.querySelector("#nextDayBtn").hidden = true;
        const timerElement = document.getElementById("timer");
        const totalMinutes = 24 * 60;
        const intervalSeconds = 4 * 60;
        const incrementMinutes = 1;
        let currentMinutes = 0;

        function update() {
            timerElement.textContent = formatTime(currentMinutes);
            currentMinutes += intervalSeconds / 60;

            if (currentMinutes % incrementMinutes === 0) {
                const data = {
                    timer_update: "please"
                }
                fetchTimerUpdate(data)
                    .then((response) => {
                        console.log(response)
                    })
            }

            if (currentMinutes > totalMinutes) {
                clearInterval(timerInterval);
                timerElement.textContent = "00:00";
                document.querySelector("#nextDayBtn").hidden = false;
                const data = {
                    next_day: "please"
                }
                fetchNextDay(data)
                    .then((response) => {
                        console.log(response)
                    })
            }
        }

        update();
        const timerInterval = setInterval(update, 1000);
    }

    updateTimer();

    const nextDayBtn = document.querySelector("#nextDayBtn")
    const storeBtn = document.querySelector("#storeBtn")
    const inventoryBtn = document.querySelector("#inventoryBtn")

    nextDayBtn.addEventListener("click", (event) => {
        updateTimer();
    })

    storeBtn.addEventListener("click", (event) => {
        let inventory = document.querySelector("#inventory")
        let store = document.querySelector("#store")
        if (store.hidden === true) {
            store.hidden = false
            inventory.hidden = true
        } else {
            store.hidden = true
            inventory.hidden = true
        }
    })

    inventoryBtn.addEventListener("click", (event) => {
        let inventory = document.querySelector("#inventory")
        let store = document.querySelector("#store")
        let inventoryList = document.querySelector("#inventoryList")
        if (inventory.hidden === true) {
            const data = {
                get_inventory: "please"
            }
            fetchUserAction(data)
                .then((response) => {
                    inventoryList.innerHTML = '';
                    for (const [key, value] of Object.entries(response)) {
                        inventoryList.innerHTML += `<li>${key}: ${value}</li>`
                    }
                })
            store.hidden = true
            inventory.hidden = false
        } else {
            store.hidden = true
            inventory.hidden = true
        }
    })

    function verifyBalanceAndDisableStoreBtns(balance) {

        if (balance < 23) {
            buyPiscivoreF.disabled = true
        } else {
            buyPiscivoreF.disabled = false
        }

        if (balance < 20) {
            buyFilterFeedF.disabled = true
        } else {
            buyFilterFeedF.disabled = false
        }

        if (balance < 25) {
            buyCarnivoreF.disabled = true
        } else {
            buyCarnivoreF.disabled = false
        }

        if (balance < 18) {
            buyHerbivoreF.disabled = true
        } else {
            buyHerbivoreF.disabled = false
        }

        if (balance < 10) {
            buyWater.disabled = true
        } else {
            buyWater.disabled = false
        }

        if (balance < 75) {
            buyFirstAidKit.disabled = true
        } else {
            buyFirstAidKit.disabled = false
        }

        if (balance < 750) {
            buyAquaticPaddock.disabled = true
        } else {
            buyAquaticPaddock.disabled = false
        }

        if (balance < 750) {
            buySemiAquaticPaddock.disabled = true
        } else {
            buySemiAquaticPaddock.disabled = false
        }

        if (balance < 750) {
            buyTerrestrialPaddock.disabled = true
        } else {
            buyTerrestrialPaddock.disabled = false
        }

        if (balance < 750) {
            buyVolatilePaddock.disabled = true
        } else {
            buyVolatilePaddock.disabled = false
        }

    }


    const zooHtml = document.querySelector(".zoo")
    const consumableStoreBtn = document.querySelector("#consumableStoreBtn")
    const paddockStoreBtn = document.querySelector("#paddockStoreBtn")
    const consumableStore = document.querySelector("#consumableStore")
    const paddockStore = document.querySelector("#paddockStore")
    const balance = document.querySelector("#balance")
    const buyPiscivoreF = document.querySelector("#buyPiscivoreF")
    const buyFilterFeedF = document.querySelector("#buyFilterFeedF")
    const buyHerbivoreF = document.querySelector("#buyHerbivoreF")
    const buyCarnivoreF = document.querySelector("#buyCarnivoreF")
    const buyWater = document.querySelector("#buyWater")
    const buyFirstAidKit = document.querySelector("#buyFirstAidKit")
    const buyAquaticPaddock = document.querySelector("#buyAquaticPaddock")
    const buySemiAquaticPaddock = document.querySelector("#buySemiAquaticPaddock")
    const buyTerrestrialPaddock = document.querySelector("#buyTerrestrialPaddock")
    const buyVolatilePaddock = document.querySelector("#buyVolatilePaddock")

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

    async function fetchTimerUpdate(data) {
        const response = await fetch("../../process/game/timerUpdate.php", {
            method: "POST",
            headers: {
                "Content-type": "application/json",
            },
            body: JSON.stringify(data),
        });
        return response.json();
    }

    async function fetchNextDay(data) {
        const response = await fetch("../../process/game/nextDay.php", {
            method: "POST",
            headers: {
                "Content-type": "application/json",
            },
            body: JSON.stringify(data),
        });
        return response.json();
    }

    async function fetchZooBuilder(data) {
        const response = await fetch("../../process/game/zooBuilder.php", {
            method: "POST",
            headers: {
                "Content-type": "application/json",
            },
            body: JSON.stringify(data),
        });
        return response.json();
    }

    paddockStoreBtn.addEventListener("click", (event) => {
        consumableStore.hidden = true
        paddockStore.hidden = false
    } )

    consumableStoreBtn.addEventListener("click", (event) => {
        consumableStore.hidden = false
        paddockStore.hidden = true
    } )

    buyPiscivoreF.addEventListener("click", (event) => {
        const data = {
            item_bought: "PiscivoreFood"
        }
        fetchUserAction(data)
            .then((response) => {
                balance.innerHTML = response
                verifyBalanceAndDisableStoreBtns(response)
            })

    })
    buyFilterFeedF.addEventListener("click", (event) => {
        const data = {
            item_bought: "FilterFeedFood"
        }
        fetchUserAction(data)
            .then((response) => {
                balance.innerHTML = response
                verifyBalanceAndDisableStoreBtns(response)
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
                verifyBalanceAndDisableStoreBtns(response)
            })
    })
    buyWater.addEventListener("click", (event) => {
        const data = {
            item_bought: "Water"
        }
        fetchUserAction(data)
            .then((response) => {
                balance.innerHTML = response
                verifyBalanceAndDisableStoreBtns(response)
            })
    })
    buyFirstAidKit.addEventListener("click", (event) => {
        const data = {
            item_bought: "FirstAidKit"
        }
        fetchUserAction(data)
            .then((response) => {
                balance.innerHTML = response
                verifyBalanceAndDisableStoreBtns(response)
            })
    })
    buyAquaticPaddock.addEventListener("click", (event) => {
        const data = {
            paddock_bought: "AquaticPaddock"
        }
        fetchUserAction(data)
            .then((response) => {
                balance.innerHTML = response
                verifyBalanceAndDisableStoreBtns(response)
            })
    })
    buySemiAquaticPaddock.addEventListener("click", (event) => {
        const data = {
            paddock_bought: "SemiAquaticPaddock"
        }
        fetchUserAction(data)
            .then((response) => {
                balance.innerHTML = response
                verifyBalanceAndDisableStoreBtns(response)
            })
    })
    buyTerrestrialPaddock.addEventListener("click", (event) => {
        const data = {
            paddock_bought: "TerrestrialPaddock"
        }
        fetchUserAction(data)
            .then((response) => {
                balance.innerHTML = response
                verifyBalanceAndDisableStoreBtns(response)
            })
    })
    buyVolatilePaddock.addEventListener("click", (event) => {
        const data = {
            paddock_bought: "VolatilePaddock"
        }
        fetchUserAction(data)
            .then((response) => {
                balance.innerHTML = response
                verifyBalanceAndDisableStoreBtns(response)
            })
    })


    function buildZoo(){
        const data = {
            balec: true
        }
        fetchZooBuilder(data)
        .then((response) => {
            zooHtml.innerHTML = response
        })
    }

    buildZoo()


})