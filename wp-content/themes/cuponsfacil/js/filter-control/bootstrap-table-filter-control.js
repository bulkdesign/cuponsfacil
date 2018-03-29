!function(t){"use strict";var e=t.fn.bootstrapTable.utils.sprintf,o=t.fn.bootstrapTable.utils.objectKeys,i=function(e,o,i){o=t.trim(o),e=t(e.get(e.length-1)),n(e,o)||e.append(t("<option></option>").attr("value",o).text(t("<div />").html(i).text()))},r=function(e){var o=e.find("option:gt(0)");o.sort(function(e,o){return e=t(e).text().toLowerCase(),o=t(o).text().toLowerCase(),t.isNumeric(e)&&t.isNumeric(o)&&(e=parseFloat(e),o=parseFloat(o)),e>o?1:e<o?-1:0}),e.find("option:gt(0)").remove(),e.append(o)},n=function(t,e){for(var o=t.get(t.length-1).options,i=0;i<o.length;i++)if(o[i].value===e.toString())return!0;return!1},a=function(t){var e=t.$header;return t.options.height&&(e=t.$tableHeader),e},l=function(t){var e="select, input";return t.options.height&&(e="table select, table input"),e},s=function(e){var o=a(e),i=l(e);e.options.valuesFilterControl=[],o.find(i).each(function(){e.options.valuesFilterControl.push({field:t(this).closest("[data-field]").data("field"),value:t(this).val(),position:function(e){if(t.fn.bootstrapTable.utils.isIEBrowser()){if(t(e).is("input")){var o=0;if("selectionStart"in e)o=e.selectionStart;else if("selection"in document){e.focus();var i=document.selection.createRange(),r=document.selection.createRange().text.length;i.moveStart("character",-e.value.length),o=i.text.length-r}return o}return-1}return-1}(t(this).get(0))})})},f=function(e){var o=null,i=[],r=a(e),n=l(e);e.options.valuesFilterControl.length>0&&r.find(n).each(function(r,n){var a,l;o=t(this).closest("[data-field]").data("field"),(i=t.grep(e.options.valuesFilterControl,function(t){return t.field===o})).length>0&&(t(this).val(i[0].value),a=t(this).get(0),l=i[0].position,t.fn.bootstrapTable.utils.isIEBrowser()&&(void 0!==a.setSelectionRange?a.setSelectionRange(l,l):t(a).val(a.value)))})},c=function(t){return String(t).replace(/(:|\.|\[|\]|,)/g,"\\$1")},u=function(e,o){var n,a,l=!1,s=0;t.each(e.columns,function(s,f){if(n="hidden",a=[],f.visible){if(f.filterControl){a.push('<div style="margin: 0 2px 2px 2px;" class="filterControl">');var u=f.filterControl.toLowerCase();f.searchable&&e.options.filterTemplate[u]&&(l=!0,n="visible",a.push(e.options.filterTemplate[u](e,f.field,n)))}else a.push('<div style="height: 34px;"></div>');if(t.each(o.children().children(),function(e,o){if((o=t(o)).data("field")===f.field)return o.find(".fht-cell").append(a.join("")),!1}),void 0!==f.filterData&&"column"!==f.filterData.toLowerCase()){var d,b,g,v,m=h(p,f.filterData.substring(0,f.filterData.indexOf(":")));if(null===m)throw new SyntaxError('Error. You should use any of these allowed filter data methods: var, json, url. Use like this: var: {key: "value"}');switch(d=f.filterData.substring(f.filterData.indexOf(":")+1,f.filterData.length),b=t(".bootstrap-table-filter-control-"+c(f.field)),i(b,"",""),m(d,b),m){case"url":t.ajax({url:d,dataType:"json",success:function(t){for(var e in t)i(b,e,t[e]);r(b)}});break;case"var":for(v in g=window[d])i(b,v,g[v]);r(b);break;case"jso":for(v in g=JSON.parse(d))i(b,v,g[v]);r(b)}}}}),l?(o.off("keyup","input").on("keyup","input",function(t){clearTimeout(s),s=setTimeout(function(){e.onColumnSearch(t)},e.options.searchTimeOut)}),o.off("change","select").on("change","select",function(t){clearTimeout(s),s=setTimeout(function(){e.onColumnSearch(t)},e.options.searchTimeOut)}),o.off("mouseup","input").on("mouseup","input",function(o){var i=t(this);""!==i.val()&&setTimeout(function(){""===i.val()&&(clearTimeout(s),s=setTimeout(function(){e.onColumnSearch(o)},e.options.searchTimeOut))},1)}),o.find(".date-filter-control").length>0&&t.each(e.columns,function(e,i){void 0!==i.filterControl&&"datepicker"===i.filterControl.toLowerCase()&&o.find(".date-filter-control.bootstrap-table-filter-control-"+i.field).datepicker(i.filterDatepickerOptions).on("changeDate",function(e){t(e.currentTarget).keyup()})})):o.find(".filterControl").hide()},p={var:function(t,e){var o=window[t];for(var n in o)i(e,n,o[n]);r(e)},url:function(e,o){t.ajax({url:e,dataType:"json",success:function(t){for(var e in t)i(o,e,t[e]);r(o)}})},json:function(t,e){var o=JSON.parse(t);for(var n in o)i(e,n,o[n]);r(e)}},h=function(t,e){for(var o=Object.keys(t),i=0;i<o.length;i++)if(o[i]===e)return t[e];return null};t.extend(t.fn.bootstrapTable.defaults,{filterControl:!1,onColumnSearch:function(t,e){return!1},filterShowClear:!1,alignmentSelectControlOptions:void 0,filterTemplate:{input:function(t,o,i){return e('<input type="text" class="form-control bootstrap-table-filter-control-%s" style="width: 100%; visibility: %s">',o,i)},select:function(t,o,i){return e('<select class="form-control bootstrap-table-filter-control-%s" style="width: 100%; visibility: %s" dir="%s"></select>',o,i,function(t){switch(t=void 0===t?"left":t.toLowerCase()){case"left":return"ltr";case"right":return"rtl";case"auto":return"auto";default:return"ltr"}}(t.options.alignmentSelectControlOptions))},datepicker:function(t,o,i){return e('<input type="text" class="form-control date-filter-control bootstrap-table-filter-control-%s" style="width: 100%; visibility: %s">',o,i)}},valuesFilterControl:[]}),t.extend(t.fn.bootstrapTable.COLUMN_DEFAULTS,{filterControl:void 0,filterData:void 0,filterDatepickerOptions:void 0,filterStrictSearch:!1,filterStartsWithSearch:!1}),t.extend(t.fn.bootstrapTable.Constructor.EVENTS,{"column-search.bs.table":"onColumnSearch"}),t.extend(t.fn.bootstrapTable.defaults.icons,{clear:"glyphicon-trash icon-clear"}),t.extend(t.fn.bootstrapTable.locales,{formatClearFilters:function(){return"Clear Filters"}}),t.extend(t.fn.bootstrapTable.defaults,t.fn.bootstrapTable.locales);var d=t.fn.bootstrapTable.Constructor,b=d.prototype.init,g=d.prototype.initToolbar,v=d.prototype.initHeader,m=d.prototype.initBody,y=d.prototype.initSearch;d.prototype.init=function(){if(this.options.filterControl){var t=this;Object.keys||o(),this.options.valuesFilterControl=[],this.$el.on("reset-view.bs.table",function(){t.options.height&&(t.$tableHeader.find("select").length>0||t.$tableHeader.find("input").length>0||u(t,t.$tableHeader))}).on("post-header.bs.table",function(){f(t)}).on("post-body.bs.table",function(){t.options.height&&t.$tableHeader.css("height","77px")}).on("column-switch.bs.table",function(){f(t)})}b.apply(this,Array.prototype.slice.apply(arguments))},d.prototype.initToolbar=function(){if(this.showToolbar=this.options.filterControl&&this.options.filterShowClear,g.apply(this,Array.prototype.slice.apply(arguments)),this.options.filterControl&&this.options.filterShowClear){var o=this.$toolbar.find(">.btn-group"),i=o.find(".filter-show-clear");i.length||(i=t(['<button class="btn btn-default filter-show-clear" ',e('type="button" title="%s">',this.options.formatClearFilters()),e('<i class="%s %s"></i> ',this.options.iconsPrefix,this.options.icons.clear),"</button>"].join("")).appendTo(o)).off("click").on("click",t.proxy(this.clearFilterControl,this))}},d.prototype.initHeader=function(){v.apply(this,Array.prototype.slice.apply(arguments)),this.options.filterControl&&u(this,this.$header)},d.prototype.initBody=function(){var e,o,n;m.apply(this,Array.prototype.slice.apply(arguments)),o=(e=this).options.data,e.pageTo<e.options.data.length?e.options.data.length:e.pageTo,n=e.options.pagination?"server"===e.options.sidePagination?e.pageTo:e.options.totalRows:e.pageTo,t.each(e.header.fields,function(a,l){var s,f,u,p=e.columns[t.fn.bootstrapTable.utils.getFieldIndex(e.columns,l)],h=t(".bootstrap-table-filter-control-"+c(p.field));if((u=p).filterControl&&"select"===u.filterControl.toLowerCase()&&u.searchable&&(void 0===(f=p).filterData||"column"===f.filterData.toLowerCase())&&(s=h)&&s.length>0){0===h.get(h.length-1).options.length&&i(h,"","");for(var d={},b=0;b<n;b++){var g=o[b][l];d[t.fn.bootstrapTable.utils.calculateObjectValue(e.header,e.header.formatters[a],[g,o[b],b],g)]=g}for(var v in d)i(h,d[v],v);r(h)}})},d.prototype.initSearch=function(){if(y.apply(this,Array.prototype.slice.apply(arguments)),"server"!==this.options.sidePagination){var e=this,o=t.isEmptyObject(this.filterColumnsPartial)?null:this.filterColumnsPartial;this.data=o?t.grep(this.data,function(i,r){for(var n in o){var a=e.columns[t.fn.bootstrapTable.utils.getFieldIndex(e.columns,n)],l=o[n].toLowerCase(),s=i[n];if(a&&a.searchFormatter&&(s=t.fn.bootstrapTable.utils.calculateObjectValue(e.header,e.header.formatters[t.inArray(n,e.header.fields)],[s,i,r],s)),a.filterStrictSearch){if(-1===t.inArray(n,e.header.fields)||"string"!=typeof s&&"number"!=typeof s||s.toString().toLowerCase()!==l.toString().toLowerCase())return!1}else if(a.filterStartsWithSearch){if(-1===t.inArray(n,e.header.fields)||"string"!=typeof s&&"number"!=typeof s||0!==(s+"").toLowerCase().indexOf(l))return!1}else if(-1===t.inArray(n,e.header.fields)||"string"!=typeof s&&"number"!=typeof s||-1===(s+"").toLowerCase().indexOf(l))return!1}return!0}):this.data}},d.prototype.initColumnSearch=function(t){if(s(this),t)for(var e in this.filterColumnsPartial=t,this.updatePagination(),t)this.trigger("column-search",e,t[e])},d.prototype.onColumnSearch=function(e){if(!(t.inArray(e.keyCode,[37,38,39,40])>-1)){s(this);var o=t.trim(t(e.currentTarget).val()),i=t(e.currentTarget).closest("[data-field]").data("field");t.isEmptyObject(this.filterColumnsPartial)&&(this.filterColumnsPartial={}),o?this.filterColumnsPartial[i]=o:delete this.filterColumnsPartial[i],this.searchText+="randomText",this.options.pageNumber=1,this.onSearch(e),this.trigger("column-search",i,o)}},d.prototype.clearFilterControl=function(){if(this.options.filterControl&&this.options.filterShowClear){var o=this,i=function(){var e=[],o=document.cookie.match(/(?:bs.table.)(\w*)/g);if(o)return t.each(o,function(o,i){/./.test(i)&&(i=i.split(".").pop()),-1===t.inArray(i,e)&&e.push(i)}),e}(),r=a(o),n=r.closest("table"),s=r.find(l(o)),c=o.$toolbar.find(".search input"),u=0;if(t.each(o.options.valuesFilterControl,function(t,e){e.value=""}),f(o),!(s.length>0))return;if(this.filterColumnsPartial={},t(s[0]).trigger("INPUT"===s[0].tagName?"keyup":"change"),c.length>0&&o.resetSearch(),o.options.sortName!==n.data("sortName")||o.options.sortOrder!==n.data("sortOrder")){var p=r.find(e('[data-field="%s"]',t(s[0]).closest("table").data("sortName")));p.length>0&&(o.onSort(n.data("sortName"),n.data("sortName")),t(p).find(".sortable").trigger("click"))}clearTimeout(u),u=setTimeout(function(){i&&i.length>0&&t.each(i,function(t,e){void 0!==o.deleteCookie&&o.deleteCookie(e)})},o.options.searchTimeOut)}}}(jQuery);