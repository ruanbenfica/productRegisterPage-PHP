function test() {
    if (document.getElementById("today").checked) {

        const element = document.getElementById('date')
        element.setAttribute("disabled","disabled")

    } else if (document.getElementById("personalized").checked)
     {
        const element = document.getElementById('date')
        element.removeAttribute("disabled")
    }
}

function wordCount() {

    let value = String(document.getElementById("description").value)
    let quantity = value.length
    let remaining = 200 - quantity

    if (remaining <= 200 && remaining >= 101) {
        document.getElementById("result").style.color = "#008000";
    } else if (remaining <= 100 && remaining >= 51) {
        document.getElementById("result").style.color = "#ffff00";
    } else if (remaining <= 50 && remaining >= 21) {
        document.getElementById("result").style.color = "#ffa500";
    } else if (remaining <= 20 && remaining >= 0) {
        document.getElementById("result").style.color = "#ff0000";
    }


    result.innerHTML = remaining
}



 