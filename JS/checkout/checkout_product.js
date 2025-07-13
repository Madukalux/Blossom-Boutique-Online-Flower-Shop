document.addEventListener("DOMContentLoaded", function () {
    const boxes = document.querySelectorAll(".box");

    boxes.forEach(box => {
        const box_img = box.querySelector("img");
        const box_name = box.querySelector("h2");
        const box_price = box.querySelector("p");
        const box_btn = box.querySelector("button");

        if (box_btn) {
            box_btn.addEventListener("click", function () {
                localStorage.setItem("box_img", box_img.src);
                localStorage.setItem("box_name", box_name.innerText);
                localStorage.setItem("box_price", box_price.innerText);

                // Optional: check login using session
                fetch("check_session.php")
                    .then(res => res.json())
                    .then(data => {
                        if (data.loggedIn) {
                            window.location.href = "checkout.html";
                        } else {
                            window.location.href = "login.html";
                        }
                    }).catch(() => {
                        window.location.href = "login.html";
                    });
            });
        }
    });
});
