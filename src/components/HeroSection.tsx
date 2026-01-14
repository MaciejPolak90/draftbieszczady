import { Phone, MessageCircle, MessageSquare, BedDouble, Bath, Flame, Utensils, TreePine, Wifi, Car, PawPrint } from "lucide-react";
import { Button } from "./ui/button";
import heroImage from "@/assets/living-room-fireplace.jpg";

const PHONE_NUMBER = "+48514995497";

const amenityIcons = [
  { icon: BedDouble, label: "2 pokoje" },
  { icon: Bath, label: "2 łazienki" },
  { icon: Flame, label: "Kominek" },
  { icon: Utensils, label: "Kuchnia" },
  { icon: TreePine, label: "Altana z grillem" },
  { icon: Wifi, label: "Wi-Fi" },
  { icon: Car, label: "Parking" },
  { icon: PawPrint, label: "Zwierzęta OK" },
];

export function HeroSection() {
  return (
    <section className="relative min-h-screen flex items-end pb-12 md:pb-20">
      {/* Background Image */}
      <div className="absolute inset-0">
        <img
          src={heroImage}
          alt="Przytulny salon z kominkiem w Bieszczadach"
          className="w-full h-full object-cover"
        />
        <div className="absolute inset-0 overlay-gradient" />
      </div>

      {/* Content */}
      <div className="relative z-10 container-narrow mx-auto px-4 w-full">
        <div className="max-w-3xl">
          {/* Price Badge */}
          <div className="inline-flex items-center gap-2 bg-primary text-primary-foreground px-4 py-2 rounded-full text-sm font-bold mb-6 shadow-card animate-fade-in">
            450 zł / doba
          </div>

          {/* Title */}
          <h1 className="font-display text-4xl sm:text-5xl md:text-6xl text-primary-foreground mb-4 animate-slide-up leading-tight">
            Bliźniak w Smereku — rodzinny wypoczynek w Bieszczadach
          </h1>

          {/* Lead */}
          <p className="text-lg md:text-xl text-primary-foreground/90 mb-8 animate-slide-up max-w-2xl" style={{ animationDelay: "0.1s" }}>
            Połówka domu na wyłączność. Do 5 osób + 2 miejsca na narożniku w salonie. 
            Kominek, 2 łazienki, kuchnia, altana z grillem. Wi-Fi i parking w cenie.
          </p>

          {/* CTAs */}
          <div className="flex flex-wrap gap-3 mb-8 animate-slide-up" style={{ animationDelay: "0.2s" }}>
            <Button asChild size="lg" className="btn-honey text-base">
              <a href="#kontakt">Sprawdź dostępność</a>
            </Button>
            <Button asChild size="lg" variant="outline" className="bg-primary-foreground/10 border-primary-foreground/30 text-primary-foreground hover:bg-primary-foreground hover:text-foreground backdrop-blur-sm">
              <a href={`tel:${PHONE_NUMBER}`}>
                <Phone className="w-4 h-4 mr-2" />
                Zadzwoń
              </a>
            </Button>
          </div>

          {/* Quick Contact */}
          <div className="hidden md:flex items-center gap-4 mb-8 animate-slide-up" style={{ animationDelay: "0.3s" }}>
            <span className="text-primary-foreground/70 text-sm">Szybki kontakt:</span>
            <a
              href={`https://wa.me/48514995497`}
              target="_blank"
              rel="noopener noreferrer"
              className="flex items-center gap-2 text-primary-foreground/90 hover:text-primary-foreground text-sm transition-colors"
            >
              <MessageCircle className="w-4 h-4" />
              WhatsApp
            </a>
            <a
              href={`sms:${PHONE_NUMBER}`}
              className="flex items-center gap-2 text-primary-foreground/90 hover:text-primary-foreground text-sm transition-colors"
            >
              <MessageSquare className="w-4 h-4" />
              SMS
            </a>
            <span className="text-primary-foreground/70 text-sm">+48 514 995 497</span>
          </div>

          {/* Amenity Icons */}
          <div className="flex flex-wrap gap-2 animate-slide-up" style={{ animationDelay: "0.4s" }}>
            {amenityIcons.map((item) => (
              <div key={item.label} className="icon-badge">
                <item.icon className="w-4 h-4 text-primary" />
                <span>{item.label}</span>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
