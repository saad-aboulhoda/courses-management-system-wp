const searchInput = document.querySelector("#headerSearchInput");
const searchResultContainer = document.querySelector("header .search ul");
let timeoutId;
searchInput.addEventListener("input", () => {
    searchResultContainer.innerHTML = "";
    const value = searchInput.value;
    if (timeoutId) clearTimeout(timeoutId);
    if (value.length < 3) return;
    timeoutId = setTimeout(async () => {
        const response = await fetch(themosis.apiUrl + `/courses/search/${value}`);
        const data = await response.json();
        data.forEach((element) => {
            const item = document.createElement("li");
            item.innerHTML = `
                <li><a href="${element.link}"><img width="48" height="24" src="${element.thumbnail}" /><h5 title="${element.title}">${element.title}</h5></a></li>
                `;
            item.addEventListener("click", (event) => {
                event.stopPropagation();
            })
            searchResultContainer.append(item);
        });
    }, 300);
});

searchInput.addEventListener("click", (event) => {
    event.stopPropagation();
});

searchInput.addEventListener("focusin", () => {
    searchResultContainer.style.display = "block";
});

document.body.addEventListener("click", () => {
    searchResultContainer.style.display = "none";
})

function inputFilter(inputId, list, item) {
    const input = document.querySelector(inputId);
    const items = document.querySelectorAll(list);

    if (!input) return;

    input.addEventListener("input", (event) => {
        const value = event.target.value;
        items.forEach((element) => {
            const title = element.querySelector(item);
            if (!title.textContent.toLowerCase().includes(value.toLowerCase())) {
                element.style.display = "none";
            } else {
                element.style.display = "flex";
            }
        });
    });
}

inputFilter("#lessonsSearchInput", ".lessons-list a", ".lesson-title");

// Taxonomies
document.querySelector("#taxSelector").addEventListener("input", (event) => {
    window.location.replace(event.target.value);
});
