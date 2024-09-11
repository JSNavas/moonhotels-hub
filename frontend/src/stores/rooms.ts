import { defineStore } from "pinia";
import { api } from "../utils/api";
import { Providers, Room } from "../types";

export const useRoomsStore = defineStore("rooms", {
  state: () => ({
    rooms: [] as Room[],
    providers: [] as Providers[],
  }),
  actions: {
    async getRooms() {
      const response = await api.get("/search");
      this.rooms = response.data.rooms;
    },

    async filterRooms(data: any) {
      const params = new URLSearchParams(data).toString();
      console.log(params);
      const response = await api.get(`/search?${params}`);
      this.rooms = response.data.rooms;
    },

    async getProviders() {
      const response = await api.get("/providers");
      this.providers = response.data;
    },
  },
});
