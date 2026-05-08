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

// =========================
// AI Chatbot
// =========================

const chatbotToggle = document.getElementById("chatbotToggle");
const chatbotBox = document.getElementById("chatbotBox");
const chatbotClose = document.getElementById("chatbotClose");
const chatbotForm = document.getElementById("chatbotForm");
const chatbotInput = document.getElementById("chatbotInput");
const chatbotMessages = document.getElementById("chatbotMessages");

if (chatbotToggle && chatbotBox) {
    chatbotToggle.addEventListener("click", function () {
        chatbotBox.classList.toggle("open");
    });
}

if (chatbotClose && chatbotBox) {
    chatbotClose.addEventListener("click", function () {
        chatbotBox.classList.remove("open");
    });
}

function addChatMessage(text, type) {
    const message = document.createElement("div");
    message.className = type === "user" ? "user-message" : "bot-message";
    message.textContent = text;

    chatbotMessages.appendChild(message);
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
}

if (chatbotForm) {
    chatbotForm.addEventListener("submit", async function (e) {
        e.preventDefault();

        const userText = chatbotInput.value.trim();
        if (userText === "") return;

        addChatMessage(userText, "user");
        chatbotInput.value = "";

        addChatMessage("جاري التفكير...", "bot");

        try {
            const response = await fetch("chatbot.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ message: userText })
            });

            const data = await response.json();

            const thinkingMessage = chatbotMessages.lastChild;
            thinkingMessage.textContent = data.reply || "لحظة 😅 صار خطأ بسيط، جرّب مرة ثانية";
        } catch (error) {
            const thinkingMessage = chatbotMessages.lastChild;
            thinkingMessage.textContent = "تعذر الاتصال بالمساعد. تأكد من تشغيل الخادم والإنترنت.";
        }
    });
}