@props([
    'varing' => '',
    'name' => '',
    'array' => [],
]);

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                        aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <div class="quickview-slider-active">
                                <div class="single-slider">
                                    <img src="" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="" alt="#">
                                </div>
                            </div>
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2 id="name"></h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-ratting-wrap">
                                    <div class="quickview-ratting">
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="#"> (1 customer review)</a>
                                </div>
                                <div class="quickview-stock">
                                    <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                </div>
                            </div>
                            <h3 id="price"></h3>
                            <div class="quickview-peragraph">
                                <p id="description"></p>
                            </div>
                            <div class="quantity">
                                <!-- Input Order -->
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                            data-type="minus" data-field="quant[1]">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quant[1]" class="input-number" data-min="1"
                                        data-max="1000" value="1">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                            data-field="quant[1]">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--/ End Input Order -->
                            </div>
                            <div class="add-to-cart">
                                <a href="#" class="btn">Add to cart</a>
                                <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                            </div>
                            <div class="default-social">
                                <h4 class="share-now">Share:</h4>
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </li>
                                    <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
    var linkElements = document.querySelectorAll('a[{{ $varing }}]');
    var name = document.getElementById('name');
    var price = document.getElementById('price');
    var description = document.getElementById('description');
    var imgAll = document.querySelectorAll('.single-slider img');
    var products = @json($array);
    // console.log(imgAll);
    linkElements.forEach(function(linkElement) {
        linkElement.addEventListener('click', function(event) {
            event.preventDefault();
            var value = this.getAttribute('{{ $varing }}');
            var productName = this.getAttribute('{{ $name }}');
            for (const key in products) {
                if (key == productName) {
                    var productArr = products[key]
                    // console.log(productArr,value);
                    if (!Array.isArray(productArr)) {   
                        productArr = productArr['data']
                    }
                    var imgText = productArr[value].image 
                    var descriptionText = productArr[value].description;
                    var nameText = productArr[value].name;
                    var priceText = productArr[value].price;
                    var formattedNumber = new Intl.NumberFormat('vi-VN').format(priceText);
                    console.log(productArr[value]);
                    description.innerHTML = descriptionText;
                    name.innerHTML = nameText;
                    price.innerHTML = formattedNumber + "đ";
                        imgAll.forEach((img, index, array) => {
                            img.src = 'images/'+imgText
                            // console.log(img);
                        })
                }

            }
        })
    });
</script>
