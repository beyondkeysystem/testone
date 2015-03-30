<div class="container main-cnt">
    <?php $this->load->view('elements/slider');?>
    <div class="tab-bx">
      <div id="horizontalTab">
        <div class="search-box">
          <div class="src-in">
            
            <form action="<?php base_url()?>magazines/search" method="post" onsubmit="return fnsubmit();">
                <button><i class="fa fa-search"></i></button>
                <input name="search" type="text" placeholder="Hello . How can we Help?">
            </form>
            
          </div>
        </div>
        <ul class="resp-tabs-list">
          <li>Latest magazine</li>
          <li>Editor's Choices </li>
          <li>Popular magazine </li>
        </ul>
        <div class="resp-tabs-container">
          <div>
            <div class="product-box">
              <div class="bs-docs-example">
                <div class="close-btn"><a href="#">X</a></div>
                <ul class="nav nav-tabs tab-n1" id="myTab">
                    <?php pr($categories);?>
                    <?php if(!empty($categories)){?>
                        <?php foreach($categories as $category){?>
                            <li class="active"><a data-toggle="tab" href="#link1">All</a></li>
                        <?php }?>
                    <?php }?>
                  
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div id="link1" class="tab-pane fade in active">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-1.jpg" alt="img"/></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"/></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"/></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"/></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"/></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"/></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-7.jpg" alt="img"/></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-8.jpg" alt="img"/></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-9.jpg" alt="img"/></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link2" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-7.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-8.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-9.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link3" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-7.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-7.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-9.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link4" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-8.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-9.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link5" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-9.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link6" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link7" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link8" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-8.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link9" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link10" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link11" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-9.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link12" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-7.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div id="link13" class="tab-pane fade">
                    <div class="in-prdt">
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 prd-box">
                        <div class="min-prdbox">
                          <div class="col-sm-7 prd-img">
                            <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                          </div>
                          <div class="col-sm-5">
                            <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                            <p class="athr-txt">Author: <span><br>
                              Red Head</span> </p>
                            <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                            <p class="athr-txt">Pages: <span>8</span> </p>
                            <p class="athr-txt">Read: <span>12</span> </p>
                            <p class="athr-txt">Favorites: <span>3</span> </p>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="in-prdt">
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-7.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-8.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-9.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div>
            <div class="in-prdt">
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-9.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-2.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-3.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-4.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-5.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-6.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-7.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-8.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 prd-box">
                <div class="min-prdbox">
                  <div class="col-sm-7 prd-img">
                    <div class="img-cap"> <span class="txt-cap"><a href="#">Lorem Ispum</a></span> <img src="/assets/front/images/product-9.jpg" alt="img"></div>
                  </div>
                  <div class="col-sm-5">
                    <p class="thumb"><img src="/assets/front/images/thumb.jpg" alt="thumb"></p>
                    <p class="athr-txt">Author: <span><br>
                      Red Head</span> </p>
                    <p class="athr-txt">Created: <span>20-25-2015</span> </p>
                    <p class="athr-txt">Pages: <span>8</span> </p>
                    <p class="athr-txt">Read: <span>12</span> </p>
                    <p class="athr-txt">Favorites: <span>3</span> </p>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="more-box"><a href="#" class="more-btn">Load More</a></div>
    </div>
  </div>

<script>
    function fnsubmit(){
        alert('sdfsgf');
        return false;
    }
</script>