import { useState, useEffect } from "react";
import { Phone, Menu, X } from "lucide-react";
import { Button } from "./ui/button";

const navItems = [
  { label: "Udogodnienia", href: "#udogodnienia" },
  { label: "Galeria", href: "#galeria" },
  { label: "Lokalizacja", href: "#lokalizacja" },
  { label: "Cennik", href: "#cennik" },
  { label: "Kontakt", href: "#kontakt" },
];

export function Header() {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 50);
    };
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <header
      className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${
        isScrolled
          ? "bg-card/95 backdrop-blur-md shadow-soft py-3"
          : "bg-transparent py-5"
      }`}
    >
      <div className="container-narrow mx-auto px-4 flex items-center justify-between">
        {/* Logo */}
        <a
          href="#"
          className={`font-display text-xl md:text-2xl font-semibold transition-colors ${
            isScrolled ? "text-foreground" : "text-primary-foreground"
          }`}
        >
          Bliźniak w Smereku
        </a>

        {/* Desktop Navigation */}
        <nav className="hidden lg:flex items-center gap-6">
          {navItems.map((item) => (
            <a
              key={item.href}
              href={item.href}
              className={`text-sm font-medium transition-colors hover:text-primary ${
                isScrolled ? "text-foreground" : "text-primary-foreground/90"
              }`}
            >
              {item.label}
            </a>
          ))}
        </nav>

        {/* Desktop CTA */}
        <div className="hidden lg:flex items-center gap-3">
          <Button asChild className="btn-honey">
            <a href="tel:+48514995497">
              <Phone className="w-4 h-4 mr-2" />
              Zadzwoń
            </a>
          </Button>
        </div>

        {/* Mobile Menu Toggle */}
        <button
          onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
          className={`lg:hidden p-2 rounded-lg transition-colors ${
            isScrolled
              ? "text-foreground hover:bg-muted"
              : "text-primary-foreground hover:bg-primary-foreground/10"
          }`}
        >
          {isMobileMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
        </button>
      </div>

      {/* Mobile Menu */}
      {isMobileMenuOpen && (
        <div className="lg:hidden absolute top-full left-0 right-0 bg-card shadow-elevated border-b border-border animate-fade-in">
          <nav className="container-narrow mx-auto px-4 py-4 flex flex-col gap-2">
            {navItems.map((item) => (
              <a
                key={item.href}
                href={item.href}
                onClick={() => setIsMobileMenuOpen(false)}
                className="text-foreground font-medium py-3 px-4 rounded-xl hover:bg-muted transition-colors"
              >
                {item.label}
              </a>
            ))}
          </nav>
        </div>
      )}
    </header>
  );
}
