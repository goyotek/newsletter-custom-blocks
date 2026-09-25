# Newsletter - Custom Blocks

Custom blocks for the [Newsletter plugin](https://www.thenewsletterplugin.com/) composer.
The plugin registers the blocks below, so they appear in the block list and can be
used in every newsletter.

## Installation

Copy the plugin folder into `wp-content/plugins` and activate **Newsletter - Custom Blocks**
from the WordPress plugins page. The Newsletter plugin must be installed and active.

## Blocks

| Block | Folder | Description |
|-------|--------|-------------|
| Dummy | `dummy/` | A minimal example block to learn how blocks are coded |
| Image Text CTA | `img-txt-btn/` | An image, title, text and a CTA button in a single container |
| Variabel Layout | `variabel-layout/` | An image, title, text and a CTA button rendered with selectable layouts |

### Variabel Layout

A content block with manual input only (no posts or other dynamic content is
retrieved): you provide the image, title, text and CTA button in the block
options. It can be rendered with the five layouts of the Newsletter "Last posts"
block, selectable in the block options:

- **One column** — image left, title/text/button right
- **One column variant** — title on top, image floated left, text/button right
- **Two columns** — image left column, title/text/button right column
- **One column, big image** — full width image, title/text/button below
- **Full post** — title on top, centered image, text and button below

All fonts, colors, paddings and the CTA button are styled inline from the block
option fields (falling back to the newsletter global styles), so every editor
change is reflected in the composed email.

## Adding a new block

1. Create a folder with a `block.php` (rendering), an `options.php` (option
   panel) and optionally an `icon.png` (32x32 pixel PNG).
2. Register the folder in `customblocks.php`:

```php
TNP_Composer::register_block(__DIR__ . '/your-block');
```

See the `dummy` block for the minimal structure and the `variabel-layout` block
for layouts, inline styles and option defaults.
