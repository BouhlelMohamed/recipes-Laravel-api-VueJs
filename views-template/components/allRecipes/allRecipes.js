axios({
    method: 'post',
    url: 'http://mohamed-bouhlel.com/recipes/public/api/find-all-recipes',
    data: {
    }
}).then(function (response) {
    console.log(response.data);
    $.each(response.data, function (i, obj) {
        var createdAt = new Date(obj.created_at);
        var createdAtDay = createdAt.getDay();
        var createdAtMonth =  createdAt.toLocaleString('fr', { month: 'long' });
        var createdAtYear = createdAt.getFullYear();
        $('.blog-posts-area').append(
            `
        <div class="single-blog-area mb-80" recipesid="${obj.id}">
            <!-- Thumbnail -->
            <div class="blog-thumbnail">
                <img src="img/blog-img/1.jpg" alt="">
                <!-- Post Date -->
                <div class="post-date">
                    <a href="#"><span>${createdAtDay}</span>${createdAtMonth} <br> ${createdAtYear}</a>
                </div>
            </div>
            <!-- Content -->
            <div class="blog-content">
                <a href="#" class="post-title">${obj.name}</a>
                <p>${obj.description}</p>
                <a href="#" class="btn delicious-btn mt-30">Voir plus</a>
            </div>
        </div>
    `)
    });
});

