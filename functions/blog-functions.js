// Functions for getting data and rendering of posts
export function getPostsData() {
    fetch("/Library/app/blog/get-posts-data.php")
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            renderPosts(response.postsData);
        } else if(response.status === "fail") {
            setNoPostsView();
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

function setNoPostsView() {
    const mainSection = document.getElementById("main-section");

    let noPostsViewSection = document.createElement("div");
    noPostsViewSection.id = "no-posts-view";

    let illustrationImage = document.createElement("img");
    illustrationImage.src = "/Library/resources/illustrations/no-posts-illustration.svg";
    illustrationImage.alt = "Հրապարակումներ";

    let message = document.createElement("p");
    message.innerText = "Հրապարակումներ դեռևս չեն ավելացվել";

    noPostsViewSection.append(illustrationImage, message);
    mainSection.append(noPostsViewSection);
}

function renderPosts(posts) {
    const mainSection = document.getElementById("main-section");

    let postsSection = document.createElement("div");
    postsSection.id = "posts-section";

    posts.forEach(post => {
        // Creating details of post block
        let postBlock = document.createElement("div");
        postBlock.id = "post";

        let title = document.createElement("h3");
        title.textContent = post.title;

        let description = document.createElement("p");
        description.classList.add("description");
        description.textContent = post.description;

        let image = document.createElement("img");
        image.src = post.imagePath;
        
        let addedDate = document.createElement("p");
        addedDate.classList.add("added-date");
        addedDate.textContent = post.created_at;

        postBlock.append(title, description, image, addedDate);

        // Adding event for view of clicked post
        postBlock.addEventListener("click", () => storeSinglePost(post.post_id));

        postsSection.append(postBlock);
    });

    mainSection.append(postsSection);
}

function storeSinglePost(postId) {
    fetch(`/Library/app/blog/store-single-post.php?id=${postId}`)
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            window.location.href = "/Library/app/blog/post/";
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

export function getSinglePost() {
    fetch("/Library/app/blog/post/get-single-post.php")
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            renderPost(response.postData);
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

function renderPost(post) {
    const fields = {
        title: document.getElementById("title"),
        description: document.getElementById("description"),
        image: document.getElementById("image")
    };

    fields.title.textContent = post.title;
    fields.description.innerHTML = post.description;
    fields.image.src = post.imagePath;
}