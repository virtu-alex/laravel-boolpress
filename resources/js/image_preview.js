const placeholder = "https://media.istockphoto.com/vectors/thumbnail-image-vector-graphic-vector-id1147544807?k=20&m=1147544807&s=612x612&w=0&h=pBhz1dkwsCMq37Udtp9sfxbjaMl27JUapoyYpQm0anc="
const image = document.getElementById('image')
const preview = document.getElementById('preview')

image.addEventListener('input', () => {
    if (image.files && image.files[0]) {
        let reader = new FileReader();
        reader.readAsDataURL(image.files[0]);
        reader.onload = event => {
            preview.src = event.target.result;
        }

    } else preview.src = placeholder;

});