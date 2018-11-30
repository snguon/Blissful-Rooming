    
    
    /*
      
     $(document).ready(function () {
        var $statelist, $usamap, ratio,
        mapsterConfigured = function () {
            // set html settings values
            var opts = $usamap.mapster('get_options', null, true);
            if (!ratio) {
                ratio = $usamap.width() / $usamap.height();
            }
            $('#stroke_highlight').prop("checked", opts.render_highlight.stroke);
            $('#strokewidth_highlight').val(opts.render_highlight.strokeWidth);
            $('#fill_highlight').val(opts.render_highlight.fillOpacity);
            $('#strokeopacity_highlight').val(opts.render_highlight.strokeOpacity);
            $('#stroke_select').prop("checked", opts.render_select.stroke);
            $('#strokewidth_select').val(opts.render_select.strokeWidth);
            $('#fill_select').val(opts.render_select.fillOpacity);
            $('#strokeopacity_select').val(opts.render_select.strokeOpacity);
            $('#img_width').val($usamap.width());
        },
        default_options =
        {
            fillOpacity: 0.5,
            render_highlight: {
                fillColor: '2aff00',
                stroke: true,
                altImage: 'bdl.png'
            },
            render_select: {
                fillColor: 'ff000c',
                stroke: false,
                altImage: 'bdl.png'
            },
            //render_zoom: {
            //    altImage: 'images/usa_map_huge.jpg'
            //},
            fadeInterval: 50,
            isSelectable: true,
            singleSelect: false,
            mapKey: 'data-state',
            mapValue: 'data-full',
            listKey: 'name',
            listSelectedAttribute: 'checked',
            sortList: "asc",
            onGetList: addCheckBoxes,
            onClick: function (e) {
                styleCheckbox(e.selected, e.listTarget);
                if (!utils.isScrolledIntoView(e.listTarget, false, $statelist)) {
                    utils.centerOn($statelist, e.listTarget);
                }
                //if (e.key==='OH') {
                //    $usamap.mapster('zoom','OH');
                //     return false;
                //}
            },
            onConfigured: mapsterConfigured,
            showToolTip: false,
            toolTipClose: ["area-mouseout"],
            areas: [
                { key: "TX",
                    toolTip: $('<div>Don\'t mess with Texas. Why? <a href="http://dontmesswithtexas.org/" target="_blank">Click here</a> for more info.</div>')
                },

                { key: "ME",
                    toolTip: $('<div style="margin:auto; width:100px;"><img src="images/lobster-small.gif"/></div><div style="clear:both;"></div><p>Trees, ocean, lobsters, it\'s all here.</p>'),
                    selected: true

                },
                { key: "AK",
                    toolTip: "Alaska.. wild, and cold. And, you cannot select this area, but you can see the tooltip.",
                    isSelectable: false
                },
                { key: "WA",
                    staticState: true
                },
                { key: "OR",
                    staticState: false
                }
                ]
        };


        function addCheckBoxes(items) {
            var item, selected;
            $statelist.children().remove();
            for (var i = 0; i < items.length; i++) {
                selected = items[i].isSelected();
                item = $('<div><input type="checkbox" name="' + items[i].key + '"' + (selected ? "checked" : "") + '><span class="sel" key="' + items[i].key + '">' + items[i].value + '</span></div>');

                $statelist.append(item);
            }
            $statelist.find('span.sel').unbind('click').bind('click', function (e) {
                var key = $(this).attr('key');
                $usamap.mapster('highlight', true, key);
            });
            // return the list to mapster so it can bind to it
            return $statelist.find('input:checkbox').unbind('click').click(function (e) {
                var selected = $(this).is(':checked');
                $usamap.mapster('set', selected, $(this).attr('name'));
                styleCheckbox(selected, $(this));
            });
        }
        function styleCheckbox(selected, $checkbox) {
            nowWeight = selected ? "bold" : "normal";
            $checkbox.closest('div').css("font-weight", nowWeight);
        }

        $statelist = $('#statelist');
        $usamap = $('#usa_image');
        function bindlinks() {
            $('*').unbind();
            $("#unbind_link").bind("click", function (e) {
                e.preventDefault();
                $usamap.mapster("unbind");
                bindlinks();
            });
            $("#rebind_link").bind("click", function (e) {
                e.preventDefault();
                $usamap.mapster(default_options);
            });

            $("#unbind_link_preserve").bind("click", function (e) {
                e.preventDefault();
                $usamap.mapster("unbind", true);
                bindlinks();
            });
            $("#tooltip").bind("click", function (e) {
                e.preventDefault();
                var state = !$usamap.mapster('get_options').showToolTip;
                $('#tooltip_state').text(state ? "enabled" : "disabled");
                $usamap.mapster("set_options", { showToolTip: state });
            });
            $("#show_selected").bind("click", function (e) {
                e.preventDefault();
                $('#selections').text($("#usa_image").mapster("get"));
            });
            $("#single_select").bind("click", function (e) {
                e.preventDefault();
                var state = !$usamap.mapster('get_options').singleSelect;
                $('#single_select_state').text(state ? "enabled" : "disabled");
                $usamap.mapster("set_options", { singleSelect: state });
            });
            $("#is_deselectable").bind("click", function (e) {
                e.preventDefault();
                var state = !$usamap.mapster('get_options').isDeselectable;
                $('#is_deselectable_state').text(state ? "enabled" : "disabled");
                $usamap.mapster("set_options", { isDeselectable: state });
            });
            function getSelected(sel) {
                var item = $();
                sel.each(function () {
                    if (this.selected) {
                        item = item.add(this);
                        return false;
                    }
                });
                return item;
            }

            function getFillOptions(el) {
                var new_options,
					val = getSelected($(el).find("option")).val();

                if (val > "0") {
                    new_options = {
                        altImage: 'images/usa_map_720_alt_' + val + '.jpg',
                        stroke: true
                    }
                } else {
                    new_options = {
                        altImage: null,
                        stroke: false
                    }
                }
                return new_options;
            }

            function getNewOptions() {
                var options,
                    render_highlight = getFillOptions($('#highlight_style')),
                    render_select = getFillOptions($('#select_style'));

                options = $.extend({},
                	default_options,
                	{
                	    render_select: render_select,
                	    render_highlight: render_highlight
                	});

                return options;

            }
            $("#highlight_style, #select_style").bind("change", function (e) {
                e.preventDefault();
                $statelist.children().remove();

                $usamap.mapster(getNewOptions());

            });


            $("#update").click(function (e) {
                var newOpts = {};
                function setOption(base, opt, value) {
                    if (value !== '' && value !== null) {
                        base[opt] = value;
                    }
                }
                e.preventDefault();

                newOpts.render_highlight = {};
                setOption(newOpts.render_highlight, "stroke", $('#stroke_highlight').prop("checked"));
                setOption(newOpts.render_highlight, "strokeWidth", $('#strokewidth_highlight').val());
                setOption(newOpts.render_highlight, "fillOpacity", $('#fill_highlight').val());
                setOption(newOpts.render_highlight, "altImageOpacity", $('#fill_highlight').val());
                setOption(newOpts.render_highlight, "strokeOpacity", $('#strokeopacity_highlight').val());

                newOpts.render_select = {};
                setOption(newOpts.render_select, "stroke", $('#stroke_select').prop("checked"));
                setOption(newOpts.render_select, "strokeWidth", $('#strokewidth_select').val());
                setOption(newOpts.render_select, "fillOpacity", $('#fill_select').val());
                setOption(newOpts.render_select, "altImageOpacity", $('#fill_select').val());
                setOption(newOpts.render_select, "strokeOpacity", $('#strokeopacity_select').val());

                var width = parseInt($('#img_width').val(), 10);

                if ($usamap.width() != width) {
                    var height = width / ratio;
                    var keys = $usamap.mapster('get');
                    $usamap.mapster('resize', width, null, 1000);
                } else {
                    $usamap.mapster('set_options', newOpts);
                }

                $('#updated').show();
                window.setTimeout(function () {
                    $('#updated').hide('slow');
                }, 2000);

            });

        };

        bindlinks();
        $.mapster.impl.init();
        $usamap.mapster(default_options);


    });


           // Utility functions
           // If you are copying code you probably won't need these.


           var utils = {};
           // Tells if an element is completely visible. if the 2nd parm is true, it only looks at the top.

           utils.isScrolledIntoView = function (elem, topOnly, container) {
               var useWindow = false, docViewTop, docViewBottom, elemTop, elemBottom;

               if (!container) {
                   container = window;
                   useWindow = true;
               }


               if (useWindow) {
                   docViewTop = $(container).scrollTop();
                   elemTop = elem.offset().top;
               } else {
                   docViewTop = 0;
                   elemTop = elem.position().top;
               }
               docViewBottom = docViewTop + $(container).height();
               elemBottom = elemTop + elem.height();


               if (topOnly) {
                   return elemTop >= docViewTop && elemTop <= docViewBottom;
               } else {
                   return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom));
               }
           };

           utils.centerOn = function ($container, $element) {
               $container.animate({
                   scrollTop: $element.position().top - ($container.height() / 2)
               }, 'slow');
           };
           
           */
