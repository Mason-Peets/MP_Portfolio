(function(api) {

  api.sectionConstructor['voyago-upsell'] = api.Section.extend({
      attachEvents: function() {},
      isContextuallyActive: function() {
          return true;
      }
  });

  const voyago_section_lists = ['banner', 'service'];
  voyago_section_lists.forEach(voyago_homepage_scroll);

  function voyago_homepage_scroll(item) {
      item = item.replace(/-/g, '_');
      wp.customize.section('voyago_' + item + '_section', function(section) {
          section.expanded.bind(function(isExpanding) {
              wp.customize.previewer.send(item, { expanded: isExpanding });
          });
      });
  }
})(wp.customize);