import { Heart } from "lucide-react";

export function Footer() {
  return (
    <footer className="bg-foreground text-primary-foreground py-12">
      <div className="container-narrow mx-auto px-4 text-center">
        <h3 className="font-display text-2xl mb-2">Bliźniak w Smereku</h3>
        <p className="text-primary-foreground/70 mb-4">
          Smerek 79, Bieszczady
        </p>
        <p className="text-primary-foreground/70 mb-6">
          <a href="tel:+48514995497" className="hover:text-primary transition-colors">
            +48 514 995 497
          </a>
        </p>
        <div className="flex items-center justify-center gap-1 text-sm text-primary-foreground/50">
          <span>Stworzone z</span>
          <Heart className="w-4 h-4 text-destructive fill-destructive" />
          <span>w Bieszczadach</span>
        </div>
      </div>
    </footer>
  );
}
