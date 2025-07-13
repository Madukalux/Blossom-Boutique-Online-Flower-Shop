let productsContainer = document.querySelector(".products .container");

fetch('fetch_products.php')
    .then(response => response.json())
    .then(products => {
        let row = null;

        products.forEach((product, index) => {
            if (index % 4 === 0) {
                row = document.createElement("div");
                row.className = "row";
                productsContainer.appendChild(row);
            }

            let box = document.createElement("div");
            box.className = "box col-md-3 col-sm-6";

            let image = document.createElement("div");
            image.className = "image";

            let text = document.createElement("div");
            text.className = "text mt-2";

            let img = document.createElement("img");
            img.className = "img";
            img.src = product.image_url;

            let head2 = document.createElement("h2");
            head2.className = "name";
            head2.innerHTML = product.name;

            let para = document.createElement("p");
            para.className = "price";
            para.innerHTML = `LKR ${product.price}.00`;

            // 👇 Create the button and attach click listener
            let btn = document.createElement("button");
            btn.className = "btn btn-primary mb-3 order-btn";
            btn.innerHTML = "Order";

            btn.addEventListener("click", () => {
                // Save product data
                localStorage.setItem("box_img", img.src);
                localStorage.setItem("box_name", product.name);
                localStorage.setItem("box_price", `LKR ${product.price}.00`);

                // Optional session check
                fetch("check_session.php")
                    .then(res => res.json())
                    .then(data => {
                        if (data.loggedIn) {
                            window.location.href = "checkout.html";
                        } else {
                            window.location.href = "login.html";
                        }
                    })
                    .catch(() => {
                        // Fallback if check fails
                        window.location.href = "login.html";
                    });
            });

            image.appendChild(img);
            text.appendChild(head2);
            text.appendChild(para);
            text.appendChild(btn);
            box.appendChild(image);
            box.appendChild(text);
            row.appendChild(box);
        });
    })
    .catch(error => {
        productsContainer.innerHTML = `<p>Error loading products</p>`;
        console.error('Fetch error:', error);
    });
