const modeToggle = document.getElementById("modeToggle");


if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark-mode");
}


if (modeToggle) {
    modeToggle.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");

        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("theme", "dark");
        } else {
            localStorage.setItem("theme", "light");
        }
    });
}

const searchInput = document.getElementById("searchInput");
const regionFilter = document.getElementById("regionFilter");
const regionCards = document.querySelectorAll(".region-card");

function filterRegions() {
    if (!regionCards.length) return;

    const searchValue = searchInput ? searchInput.value.trim().toLowerCase() : "";
    const filterValue = regionFilter ? regionFilter.value : "all";

    regionCards.forEach(card => {
        const name = card.dataset.name.toLowerCase();
        const group = card.dataset.group;

        const matchesSearch = name.includes(searchValue);
        const matchesFilter = filterValue === "all" || group === filterValue;

        if (matchesSearch && matchesFilter) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}

if (searchInput) {
    searchInput.addEventListener("keyup", filterRegions);
}

if (regionFilter) {
    regionFilter.addEventListener("change", filterRegions);
}

document.querySelectorAll(".region-card").forEach(card => {
    card.addEventListener("click", function () {
        const link = this.getAttribute("data-link");
        if (link) {
            window.location.href = link;
        }
    });
});

document.querySelectorAll(".details-link").forEach(btn => {
    btn.addEventListener("click", function (e) {
        e.stopPropagation();
    });
});