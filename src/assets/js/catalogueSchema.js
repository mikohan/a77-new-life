import "../vendor/imagemapster/jquery.imagemapster.min";

(function() {
  if (window.innerWidth > 400) {
    var image = $("img[usemap]");
    var areas = $.map($("area[data-key]"), function(el) {
      var data = $(el).attr("data-full");
      var tt_data = JSON.parse(data);
      let products_rows = "";
      if (tt_data.hasOwnProperty("products") && tt_data.products.length) {
        tt_data.products.forEach((product) => {
          products_rows += `
      <div class="catalogue__tooltip-inner-item-row">
          <div class="catalogue__tooltip-inner-item-col catalogue__tooltip-inner-item-col-img">
            <img src="${product.tmb ?? "/assets/images/products/product-default-70.webp"
            }" alt="${product.name}"  title="${product.name}" />
          </div>
          <div class="catalogue__tooltip-inner-item-col catalogue__tooltip-inner-item-col-name">
            ${product.name}
          </div>
          <div class="catalogue__tooltip-inner-item-col catalogue__tooltip-inner-item-col-brand">
            ${product.brand}
          </div>
          <div class="catalogue__tooltip-inner-item-col catalogue__tooltip-inner-item-col-price">
            &#8381; ${product.price}
          </div>
        </div>
        `;
        });
      }
      const tooltip = `
    <div class="catalogue__tooltip-item-container">
      <div class="catalogue__tooltip-item-header">
        <div class="catalogue__tooltip-col">
          ${tt_data.h5_cat_number}
        </div>
        <div class="catalogue__tooltip-col catalogue__tooltip-col-name">
          ${tt_data.h4_title}
        </div>
        <div class="catalogue__tooltip-col">
          ${tt_data.count} штук на машине
        </div>  
      </div>
      <div class="catalogue__toltip-item-inner-container">
        ${products_rows}
        
      </div>
    </div> 
    `;

      return {
        key: $(el).attr("data-key"),
        toolTip: tooltip, //$(el).attr('data-class'),
      };
    });
    image.mapster({
      fillColor: "ff0000",
      showToolTip: true,
      toolTipContainer: '<div class="catalogue__tooltip-container"></div>',
      fillOpacity: 0.3,
      stroke: true,
      singleSelect: true,
      mapKey: "data-key",
      onMouseover: function(e) {
        var item = $(".side-" + e.key);
        item.addClass("catalogue__ul_li_hovered");
      },
      onMouseout: function(e) {
        var item = $(".side-" + e.key);
        item.removeClass("catalogue__ul_li_hovered");
      },
      onClick: function(e) {
        var item = $(".side-" + e.key);
        $("li").removeClass("catalogue__ul_li_hovered_two");
        if (e.selected) {
          item.addClass("catalogue__ul_li_hovered_two");
        } else {
          item.removeClass("catalogue__ul_li_hovered_two");
        }
      },
      areas: areas,
    });
  }
})(jQuery);
