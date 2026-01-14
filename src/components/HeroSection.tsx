import houseExterior from "@/assets/house-exterior.jpg";
import { ChevronDown } from "lucide-react";

export function HeroSection() {
  const scrollToDetails = () => {
    const element = document.getElementById("details");
    if (element) {
      element.scrollIntoView({ behavior: "smooth" });
    }
  };

  return (
    <section className="relative h-screen w-full overflow-hidden">
      {/* Background Image */}
      <div className="absolute inset-0">
        <img
          src={houseExterior}
          alt="Bliźniak w Smereku - widok zewnętrzny domu"
          className="h-full w-full object-cover"
        />
        <div className="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50" />
      </div>

      {/* Minimal Content */}
      <div className="relative z-10 flex h-full flex-col items-center justify-center px-4">
        <h1 className="font-display text-4xl md:text-6xl lg:text-7xl text-white text-center drop-shadow-lg">
          Bliźniak w Smereku
        </h1>
        <p className="mt-4 text-lg md:text-xl text-white/90 text-center drop-shadow">
          Bieszczady
        </p>
      </div>

      {/* Scroll indicator */}
      <button
        onClick={scrollToDetails}
        className="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center text-white/80 hover:text-white transition-colors animate-bounce"
        aria-label="Przewiń w dół"
      >
        <span className="text-sm mb-2">Odkryj więcej</span>
        <ChevronDown className="h-6 w-6" />
      </button>
    </section>
  );
}
