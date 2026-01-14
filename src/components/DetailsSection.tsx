import { Button } from "@/components/ui/button";
import {
  Phone,
  MessageCircle,
  MessageSquare,
  BedDouble,
  Bath,
  Flame,
  Utensils,
  TreePine,
  Wifi,
  Car,
  PawPrint,
} from "lucide-react";

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

export function DetailsSection() {
  return (
    <section id="details" className="bg-background py-16 md:py-24">
      <div className="container-narrow mx-auto px-4">
        <div className="max-w-4xl mx-auto text-center">
          {/* Price badge */}
          <div className="inline-block mb-6">
            <span className="bg-primary text-primary-foreground px-6 py-3 rounded-full text-xl md:text-2xl font-bold shadow-card">
              450 zł / doba
            </span>
          </div>

          {/* Main heading */}
          <h2 className="font-display text-3xl md:text-4xl lg:text-5xl text-foreground mb-6">
            Rodzinny wypoczynek w Bieszczadach
          </h2>

          {/* Description */}
          <p className="text-lg md:text-xl text-muted-foreground mb-10 max-w-2xl mx-auto leading-relaxed">
            Połówka domu na wyłączność. Do 5 osób + 2 miejsca na narożniku w salonie. 
            Kominek, 2 łazienki, kuchnia, altana z grillem. Wi-Fi i parking w cenie.
          </p>

          {/* CTA Buttons */}
          <div className="flex flex-col sm:flex-row gap-4 justify-center mb-10">
            <Button asChild size="lg" className="btn-honey text-lg px-8 py-6">
              <a href="#kontakt">Sprawdź dostępność</a>
            </Button>
            <Button
              asChild
              variant="outline"
              size="lg"
              className="text-lg px-8 py-6 border-primary text-primary hover:bg-primary hover:text-primary-foreground"
            >
              <a href={`tel:${PHONE_NUMBER}`}>
                <Phone className="mr-2 h-5 w-5" />
                Zadzwoń
              </a>
            </Button>
          </div>

          {/* Quick contact */}
          <div className="flex flex-wrap items-center justify-center gap-4 mb-12 text-muted-foreground">
            <span className="text-sm">Szybki kontakt:</span>
            <a
              href={`https://wa.me/48514995497`}
              className="flex items-center gap-2 hover:text-primary transition-colors"
              target="_blank"
              rel="noopener noreferrer"
            >
              <MessageCircle className="h-4 w-4" />
              WhatsApp
            </a>
            <a
              href={`sms:${PHONE_NUMBER}`}
              className="flex items-center gap-2 hover:text-primary transition-colors"
            >
              <MessageSquare className="h-4 w-4" />
              SMS
            </a>
            <span className="font-medium text-foreground">+48 514 995 497</span>
          </div>

          {/* Amenity icons */}
          <div className="flex flex-wrap justify-center gap-3">
            {amenityIcons.map((item) => (
              <div
                key={item.label}
                className="icon-badge"
              >
                <item.icon className="h-4 w-4 text-primary" />
                <span>{item.label}</span>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
