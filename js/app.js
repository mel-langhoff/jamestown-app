console.log("JS WORKING 🔥");

document.addEventListener("DOMContentLoaded", () => {

  const app = document.getElementById("app");

  if (!app) {
    console.error("NO #app DIV FOUND");
    return;
  }

  fetch("/wp-json/jamestown/v1/posts")
    .then(res => res.json())
    .then(posts => {
      console.log("POSTS:", posts);

      if (!posts || posts.length === 0) {
        app.innerHTML = "<p>No posts found.</p>";
        return;
      }

      posts.forEach((post, index) => {

        const card = document.createElement("div");
        card.className = "card";

        // 👇 THIS IS THE FIX
        card.innerHTML = `
          <h2>${post.title?.rendered || "No title"}</h2>
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