( function() {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const {
    useBlockProps,
    RichText,
    MediaUpload,
    MediaUploadCheck,
    InspectorControls,
    InnerBlocks,
    PanelColorSettings
  } = wp.blockEditor || wp.editor;
  const { Button, PanelBody, RangeControl } = wp.components;

  const TEMPLATE = [
    ['core/buttons', {}, [
      ['core/button', { text: __('Call to action', 'flixbe') }]
    ]]
  ];

  registerBlockType('flixbe/hero', {
    edit: (props) => {
      const { attributes, setAttributes, className } = props;
      const { title, text, mediaURL, dimRatio } = attributes;

      const blockProps = useBlockProps({
        className: `wp-block-flixbe-hero ${className || ''} has-overlay`,
        style: mediaURL ? {
          backgroundImage: `linear-gradient(rgba(0,0,0,${dimRatio/100}), rgba(0,0,0,${dimRatio/100})), url(${mediaURL})`
        } : undefined
      });

      return (
        wp.element.createElement(wp.element.Fragment, null,
          wp.element.createElement(InspectorControls, null,
            wp.element.createElement(PanelBody, { title: __('Background', 'flixbe'), initialOpen: true },
              wp.element.createElement(MediaUploadCheck, null,
                wp.element.createElement(MediaUpload, {
                  onSelect: (media) => setAttributes({ mediaURL: media.url, mediaID: media.id }),
                  value: attributes.mediaID,
                  render: ({ open }) =>
                    wp.element.createElement(Button, { onClick: open, isSecondary: true },
                      mediaURL ? __('Change image', 'flixbe') : __('Select image', 'flixbe')
                    )
                })
              ),
              wp.element.createElement(RangeControl, {
                label: __('Overlay (opacity)', 'flixbe'),
                value: dimRatio, onChange: (v)=> setAttributes({ dimRatio: v }),
                min: 0, max: 90, step: 5
              })
            )
          ),
          wp.element.createElement('section', blockProps,
            wp.element.createElement('div', { className: 'hero__inner' },
              wp.element.createElement(RichText, {
                tagName: 'h1',
                placeholder: __('Scrivi il titolo…', 'flixbe'),
                value: title,
                onChange: (v)=> setAttributes({ title: v })
              }),
              wp.element.createElement(RichText, {
                tagName: 'p',
                placeholder: __('Aggiungi un sottotitolo…', 'flixbe'),
                value: text,
                onChange: (v)=> setAttributes({ text: v })
              }),
              wp.element.createElement(InnerBlocks, {
                template: TEMPLATE, templateLock: false
              })
            )
          )
        )
      );
    },
    save: (props) => {
      const { attributes } = props;
      const { title, text, mediaURL, dimRatio } = attributes;

      const blockProps = wp.blockEditor
        ? wp.blockEditor.useBlockProps.save({
            className: `wp-block-flixbe-hero has-overlay`,
            style: mediaURL ? {
              backgroundImage: `linear-gradient(rgba(0,0,0,${dimRatio/100}), rgba(0,0,0,${dimRatio/100})), url(${mediaURL})`
            } : undefined
          })
        : { className: 'wp-block-flixbe-hero has-overlay' };

      return wp.element.createElement('section', blockProps,
        wp.element.createElement('div', { className: 'hero__inner' },
          wp.element.createElement(RichText.Content, { tagName: 'h1', value: title }),
          wp.element.createElement(RichText.Content, { tagName: 'p', value: text }),
          wp.element.createElement(InnerBlocks.Content, null)
        )
      );
    }
  });
} )();