const API_BASE = "https://api.domain.com/v1"; // بعداً دامنه واقعی را جایگزین کن

async function login() {
    const mobile = document.getElementById('mobile').value;
    const password = document.getElementById('password').value;
    const msg = document.getElementById('login-message');

    msg.textContent = "";

    try {
        const res = await fetch(API_BASE + "/auth/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ mobile, password }),
        });

        const data = await res.json();

        if (!res.ok) {
            msg.textContent = data.message || "ورود ناموفق بود";
            return;
        }

        // TODO: ذخیره توکن، رفتن به داشبورد
        console.log("Logged in:", data);
        window.location.href = "dashboard.html";
    } catch (e) {
        console.error(e);
        msg.textContent = "مشکلی در ارتباط با سرور رخ داد.";
    }
}

