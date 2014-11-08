module Jekyll
  class AuthorIndex < Page
    def initialize(site, base, dir, author)
      @site = site
      @base = base
      @dir = dir
      @name = 'index.html'
      self.process(@name)
      self.read_yaml(File.join(base, '_layouts'), 'author.html')
      self.data['author'] = author
      self.data['title'] = "Posts by \"#{author}\""
    end
  end
  class AuthorGenerator < Generator
    safe true
    def generate(site)
      if site.layouts.key? 'author'
        dir = site.config['author_dir'] || 'search'
        site.posts.each_with_index do |post, i|
          if post.data.include? "author"
            author = "#{post.data['author']}"
            write_author_index(site, File.join(dir, author), author)
          end
        end
      end
    end
    def write_author_index(site, dir, author)
      index = AuthorIndex.new(site, site.source, dir, author)
      index.render(site.layouts, site.site_payload)
      index.write(site.dest)
      site.pages << index
    end
  end
end