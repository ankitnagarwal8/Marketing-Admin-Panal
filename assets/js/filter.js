const selects = document.querySelectorAll("select")
const items = document.querySelectorAll("#item-container div")

selects.forEach((select) => {
	select.addEventListener("change", processChange)
})

function processChange(e){
	// console.log(e.target)
	if(e.target.name === "Catagary"){
		items.forEach((item) => {
			if(item.getAttribute("data-category") === e.target.value){
				item.style.display = "block"
			}

			else{
				item.style.display = "none"
			}
		})
	}
}

