UPDATE `ang_blog_articles` SET slug = lower(title),
slug = replace(slug, '.', ' '),
slug = replace(slug, '\'', '-'),
slug = replace(slug,'а','a'),
slug = replace(slug,'б','bj'),
slug = replace(slug,'в','v'),
slug = replace(slug,'г','g'),
slug = replace(slug,'д','d'),
slug = replace(slug,'е','e'),
slug = replace(slug,'ё','e'),
slug = replace(slug,'ж','j'),
slug = replace(slug,'з','z'),
slug = replace(slug,'и','i'),
slug = replace(slug,'й','i'),
slug = replace(slug,'к','k'),
slug = replace(slug,'л','l'),
slug = replace(slug,'м','m'),
slug = replace(slug,'н','n'),
slug = replace(slug,'о','o'),
slug = replace(slug,'п','p'),
slug = replace(slug,'р','r'),
slug = replace(slug,'с','s'),
slug = replace(slug,'т','t'),
slug = replace(slug,'у','u'),
slug = replace(slug,'ф','f'),
slug = replace(slug,'х','h'),
slug = replace(slug,'ц','c'),
slug = replace(slug,'ч','ch'),
slug = replace(slug,'ш','sh'),
slug = replace(slug,'щ','sh'),
slug = replace(slug,'ь',''),
slug = replace(slug,'ы','i'),
slug = replace(slug,'ъ',''),
slug = replace(slug,'э','e'),
slug = replace(slug,'ю','u'),
slug = replace(slug,'я','ya'),
slug = trim(slug),
slug = replace(slug, ' ', '-'),
slug = replace(slug, '--', '-') ;
