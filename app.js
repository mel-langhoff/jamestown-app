console.log("JS WORKING");

document.addEventListener("DOMContentLoaded", () => {
  const app = document.getElementById("app");

  const postsContainer = document.createElement("div");
  app.appendChild(postsContainer);

  fetch("https://corsproxy.io/?https://jamestownco.org/wp-json/wp/v2/posts")
    .then(res => res.json())
    .then(posts => {

      posts.forEach((post, index) => {

        if (index === 2) {
          const img = document.createElement("div");
          img.className = "parallax";
          img.style.backgroundImage =
            "url('https://jamestownco.org/wp-content/uploads/2026/03/collage.png')";
          postsContainer.appendChild(img);
        }

        const card = document.createElement("div");
        card.className = "card";

        card.innerHTML = `
          <h2>${post.title.rendered}</h2>
          <div>${post.excerpt.rendered}</div>
        `;

        postsContainer.appendChild(card);
      });

    });
});