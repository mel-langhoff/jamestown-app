console.log("JS WORKING 🔥");

document.addEventListener("DOMContentLoaded", () => {

  const app = document.getElementById("app");

  if (!app) {
    console.error("NO #app DIV FOUND");
    return;
  }

  fetch(`/wp-json/jamestown/v1/posts?nocache=${Date.now()}`)
    .then(res => res.json())
    .then(posts => {

      if (!posts || posts.length === 0) {
        app.innerHTML = "<p>No posts found.</p>";
        return;
      }

      app.innerHTML = "";

      posts.forEach(post => {

        const card = document.createElement("a"); // 🔥 CHANGE: make it a link
        card.href = post.link;
        card.className = "news-card";

        card.innerHTML = `
          <h3>${post.title?.rendered || "No title"}</h3>
          <div>${post.excerpt?.rendered || ""}</div>
        `;

        app.appendChild(card);
      });

    })
    .catch(err => {
      console.error("FETCH ERROR:", err);
      app.innerHTML = "<p style='color:red;'>Error loading posts.</p>";
    });

});

document.addEventListener("DOMContentLoaded", () => {
  const hero = document.getElementById("heroText");

  if (hero) {
    setTimeout(() => {
      hero.classList.add("animate");
    }, 200);
  }
});