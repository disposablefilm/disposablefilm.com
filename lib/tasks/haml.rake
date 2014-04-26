desc "Parse haml layouts"
task :parse_haml do
  print "Parsing Haml layouts..."
  system(%{
    cd _layouts/haml &&
    for f in *.haml; do echo $f; [ -e $f ] && haml --trace $f ../${f%.haml}.html; done
  })
  puts "done."
end